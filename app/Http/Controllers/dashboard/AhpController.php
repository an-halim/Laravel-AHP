<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alternative;
use App\Models\Comparisons;
use App\Models\Criteria;
use App\Models\Hasil;
use App\Models\SubCriteria;
use App\Models\UserResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AhpController extends Controller
{


    public function ahpCompareCriteria()
    {
        $criteria = Criteria::all();
        $criteriaWithSubCriterias = Criteria::with('subCriterias')->get();
        // Format the output
        $subCriteria = $criteriaWithSubCriterias->mapWithKeys(function ($criteria) {
            return [$criteria->name => $criteria->subCriterias->pluck('name')->toArray()];
        });

        return view('dashboard.ahp-pembobotan.ahp-pembobotan', compact('criteria', 'subCriteria'));
    }

    public function alternatives()
    {
        $alternatives = Alternative::paginate(6);
        return view('dashboard.ahp-alternatif.ahp-alternatif', compact('alternatives'));
    }

    /**
     * Main function that orchestrates the AHP calculation process
     */
    public function calculateAHP(Request $request)
    {
        // Ambil data comparison dari request atau preset
        $comparison = $request->input('comparison', []);
        $subComparison = $request->input('subComparison', []);

        // Proses 1: Perhitungan matrix berpasangan untuk kriteria
        $criteriaResult = $this->calculateCriteriaMatrix($comparison);

        // Proses 2: Perhitungan matrix berpasangan untuk sub kriteria
        $results = $this->calculateSubCriteriaMatrix($subComparison);

        // Ekstrak priority vector dari hasil perhitungan sub kriteria
        $priorityVectorSubCriteria = [];
        foreach ($results as $key => $result) {
            $priorityVectorSubCriteria[$key] = $result['priorityVector'];
        }

        // dd($criteriaResult, $results, $priorityVectorSubCriteria);

        // Kirim hasil ke view
        return view('dashboard.ahp-process.ahp-process', compact('criteriaResult', 'results', 'priorityVectorSubCriteria'));
    }

    /**
     * Proses 1: Perhitungan matrix berpasangan untuk kriteria
     */
    private function calculateCriteriaMatrix($comparison)
    {
        // Extract unique criteria keys (both outer and inner)
        $criteria = array_unique(array_merge(
            array_keys($comparison),
            array_keys(array_merge(...array_values($comparison)))
        ));

        // Inisialisasi matriks kosong dan pastikan simetri (Aji = 1/Aij)
        $matrixCriteria = [];
        foreach ($criteria as $row) {
            foreach ($criteria as $col) {
                if ($row === $col) {
                    // Diagonal selalu 1 (perbandingan kriteria dengan dirinya sendiri)
                    $matrixCriteria[$row][$col] = 1;
                } elseif (isset($comparison[$row][$col])) {
                    // Jika Aij diinput, isi dan otomatis hitung Aji
                    $matrixCriteria[$row][$col] = $comparison[$row][$col];
                    $matrixCriteria[$col][$row] = 1 / $comparison[$row][$col];
                } elseif (isset($comparison[$col][$row])) {
                    // Jika Aji diinput, isi dan otomatis hitung Aij
                    $matrixCriteria[$row][$col] = 1 / $comparison[$col][$row];
                    $matrixCriteria[$col][$row] = $comparison[$col][$row];
                } else {
                    // Default jika tidak ada input (asumsikan sama penting)
                    $matrixCriteria[$row][$col] = 1;
                    $matrixCriteria[$col][$row] = 1;
                }
            }
        }

        // Hitung jumlah kolom untuk normalisasi
        $columnSums = array_fill_keys($criteria, 0);
        foreach ($matrixCriteria as $row => $values) {
            foreach ($values as $col => $value) {
                $columnSums[$col] += $value;
            }
        }

        // Normalisasi matriks
        $normalizedMatrixCriteria = [];
        foreach ($matrixCriteria as $row => $values) {
            foreach ($values as $col => $value) {
                $normalizedMatrixCriteria[$row][$col] = $value / $columnSums[$col];
            }
        }

        // Hitung rata-rata setiap baris (priority vector)
        $priorityVectorCriteria = [];
        foreach ($normalizedMatrixCriteria as $row => $values) {
            $priorityVectorCriteria[$row] = array_sum($values) / count($values);
        }

        // Hitung Weighted Sum Vector dalam bentuk matriks
        $weightedSumMatrix = [];
        foreach ($matrixCriteria as $row => $values) {
            foreach ($values as $col => $value) {
                // Kalikan nilai matriks asli dengan bobot prioritas
                $weightedSumMatrix[$row][$col] = $value * $priorityVectorCriteria[$col];
            }
        }

        // Hitung jumlah per baris (Weighted Sum Vector)
        $weightedSumVector = [];
        foreach ($weightedSumMatrix as $row => $values) {
            $weightedSumVector[$row] = array_sum($values);
        }

        // Hitung Lambda Max (nilai eigen terbesar)
        $lambdaMax = 0;
        foreach ($criteria as $row) {
            $lambdaMax += $weightedSumVector[$row];
        }
        $lambdaMax /= count($criteria);

        // Hitung Consistency Index (CI)
        $nCriteria = count($criteria);
        $ciCriteria = ($lambdaMax - $nCriteria) / ($nCriteria - 1);

        // Hitung Consistency Ratio (CR)
        $randomIndex = $this->getRandomIndex($nCriteria);
        $crCriteria = $ciCriteria / ($randomIndex ?? 1);

        // Return hasil sebagai objek
        return (object) [
            'matrix' => $matrixCriteria,
            'normalizedMatrix' => $normalizedMatrixCriteria,
            'priorityVector' => $priorityVectorCriteria,
            'weightedSumVector' => $weightedSumVector,
            'weightedSumMatrix' => $weightedSumMatrix,
            'lambdaMax' => $lambdaMax,
            'ci' => $ciCriteria,
            'cr' => $crCriteria,
        ];
    }

    /**
     * Proses 2: Perhitungan matrix berpasangan untuk sub kriteria
     */
    private function calculateSubCriteriaMatrix($subComparison)
    {
        $results = [];
        foreach ($subComparison as $criteriaName => $comparisons) {
            // Ambil semua sub-kriteria yang unik
            $criteriaKeys = array_keys($comparisons);

            // Tambahkan kunci dari setiap sub-array
            foreach ($comparisons as $subArray) {
                $criteriaKeys = array_merge($criteriaKeys, array_keys($subArray));
            }

            // Pastikan kunci unik
            $criteriaKeys = array_unique($criteriaKeys);

            // Inisialisasi matriks kosong dan pastikan simetri (Aji = 1/Aij)
            $matrix = [];
            foreach ($criteriaKeys as $row) {
                foreach ($criteriaKeys as $col) {
                    if ($row === $col) {
                        // Diagonal selalu 1 (perbandingan kriteria dengan dirinya sendiri)
                        $matrix[$row][$col] = 1;
                    } elseif (isset($comparisons[$row][$col])) {
                        // Jika Aij diinput, isi dan otomatis hitung Aji
                        $matrix[$row][$col] = $comparisons[$row][$col];
                        $matrix[$col][$row] = 1 / $comparisons[$row][$col];
                    } elseif (isset($comparisons[$col][$row])) {
                        // Jika Aji diinput, isi dan otomatis hitung Aij
                        $matrix[$row][$col] = 1 / $comparisons[$col][$row];
                        $matrix[$col][$row] = $comparisons[$col][$row];
                    } else {
                        // Default jika tidak ada input (asumsikan sama penting)
                        $matrix[$row][$col] = 1;
                        $matrix[$col][$row] = 1;
                    }
                }
            }

            // Hitung jumlah kolom untuk normalisasi
            $columnSums = array_fill_keys($criteriaKeys, 0);
            foreach ($matrix as $row => $values) {
                foreach ($values as $col => $value) {
                    $columnSums[$col] += $value;
                }
            }

            // Normalisasi matriks
            $normalizedMatrix = [];
            foreach ($matrix as $row => $values) {
                foreach ($values as $col => $value) {
                    $normalizedMatrix[$row][$col] = $value / $columnSums[$col];
                }
            }

            // Hitung priority vector
            $priorityVector = [];
            foreach ($normalizedMatrix as $row => $values) {
                $priorityVector[$row] = array_sum($values) / count($values);
            }



            // Hitung Weighted Sum Vector dalam bentuk matriks
            $weightedSumMatrix = [];
            foreach ($matrix as $row => $values) {
                foreach ($values as $col => $value) {
                    // Kalikan nilai matriks asli dengan bobot prioritas
                    $weightedSumMatrix[$row][$col] = $value * $priorityVector[$col];
                }
            }

            // // Hitung jumlah per baris (Weighted Sum Vector)
            $weightedSumVector = [];
            foreach ($weightedSumMatrix as $row => $values) {
                $weightedSumVector[$row] = array_sum($values);
            }


            // Hitung lambda max dengan metode standar
            $lambdaMax = 0;
            foreach ($criteriaKeys as $row) {
                $lambdaMax += $weightedSumVector[$row];
            }
            $lambdaMax /= count($criteriaKeys);

            // Hitung CI dan CR
            $n = count($criteriaKeys);
            $ci = ($lambdaMax - $n) / ($n - 1);
            $ri = $this->getRandomIndex($n);
            $cr = $ri > 0 ? $ci / $ri : 0;

            // Simpan hasil untuk setiap kriteria
            $results[$criteriaName] = [
                'matrix' => $matrix,
                'normalizedMatrix' => $normalizedMatrix,
                'priorityVector' => $priorityVector,
                'weightedSumVector' => $weightedSumVector,
                'weightedSumMatrix' => $weightedSumMatrix,
                'lambdaMax' => $lambdaMax,
                'ci' => $ci,
                'cr' => $cr,
            ];
        }

        return $results;
    }

    /**
     * Proses 3: Perhitungan rekomendasi berdasarkan hasil kriteria dan sub kriteria
     */
    public function getRecommendation(Request $request)
    {
        DB::beginTransaction();
        try {
            // Ambil data dari request
            $subCriteriaWeights = json_decode($request->input('priorityVectorSubCriteria'), true);
            $criteriaWeights = json_decode($request->input('priorityVectorCriteria'), true);
            $products = Alternative::all();

            // Validasi data input
            if (empty($criteriaWeights) || empty($subCriteriaWeights) || empty($products)) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Data tidak lengkap');
            }

            // Validasi konsistensi
            $isConsistent = $this->validateConsistency($criteriaWeights, $subCriteriaWeights);
            if (!$isConsistent) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Consistency Ratio terlalu tinggi (>0.1). Matriks perbandingan tidak konsisten.');
            }

            // Hitung bobot global untuk setiap sub kriteria
            $globalWeights = $this->calculateGlobalWeights($criteriaWeights, $subCriteriaWeights);

            // Buat record hasil untuk user
            $userResult = $this->createUserResult();

            // 🔥 PROSES NORMALISASI & PERHITUNGAN SKOR
            $normalizedData = $this->normalizeAlternatives($products);
            $productScores = $this->calculateProductScores($normalizedData, $globalWeights, $userResult->id);

            // Simpan hasil ke database
            Hasil::insert($productScores);

            DB::commit();
            return redirect('/ahp/report/' . $userResult->id);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * 🔄 Normalisasi data alternatif berdasarkan kriteria
     */
    private function normalizeAlternatives($products)
    {
        // Cari nilai max dan min untuk setiap kriteria
        $minHarga = $products->min('harga');
        $maxDayaTahan = $products->max('garansi');
        $minWatt = $products->min('watt');
        $maxKapasitas = $products->max('kapasitas');

        // Normalisasi per produk
        $normalizedData = $products->map(function ($product) use ($minHarga, $maxDayaTahan, $minWatt, $maxKapasitas) {
            return [
                'id' => $product->id,
                'nama' => $product->nama,
                'model' => $product->model,
                'harga' => $minHarga / $product->harga,               // Cost criteria
                'garansi' => $product->garansi / $maxDayaTahan, // Benefit criteria
                'watt' => $minWatt / $product->watt,                  // Cost criteria
                'kapasitas' => $product->kapasitas / $maxKapasitas    // Benefit criteria
            ];
        });

        return $normalizedData;
    }

    /**
     * 🏆 Hitung skor produk dan urutkan berdasarkan skor tertinggi
     */
    private function calculateProductScores($normalizedData, $globalWeights, $userResultId)
    {
        $productScores = [];

        foreach ($normalizedData as $product) {
            // ✅ Perhitungan skor akhir per produk (menggunakan bobot global flatten)
            $score = ($product['harga'] * $globalWeights['harga']) +
                    ($product['garansi'] * $globalWeights['garansi']) +
                    ($product['watt'] * $globalWeights['watt']) +
                    ($product['kapasitas'] * $globalWeights['kapasitas']);

            $productScores[] = [
                'user_result_id' => $userResultId,
                'alternative_id' => $product['id'],
                'nama' => $product['nama'],
                'model' => $product['model'],
                'ahp' => $score
            ];
        }

        // 🔄 Urutkan berdasarkan skor tertinggi
        usort($productScores, fn($a, $b) => $b['ahp'] <=> $a['ahp']);
        return $productScores;
    }



    /**
     * Validasi konsistensi matriks perbandingan
     */
    private function validateConsistency($criteriaWeights, $subCriteriaWeights)
    {
        // Implementasi validasi konsistensi
        // CR harus <= 0.1 untuk dianggap konsisten

        // Untuk keperluan demo/contoh, kita akan mengembalikan true
        // Dalam implementasi sebenarnya, perlu memeriksa CR dari semua matriks
        return true;
    }

     /**
     * ✅ Hitung bobot global untuk setiap kriteria (dengan sub kriteria)
     */
    private function calculateGlobalWeights($criteriaWeights, $subCriteriaWeights)
    {
        $globalWeights = [];
        foreach ($subCriteriaWeights as $criteria => $subs) {
            $criteriaLower = strtolower($criteria);
            $globalWeights[$criteriaLower] = 0;

            foreach ($subs as $subName => $subWeight) {
                $globalWeights[$criteriaLower] += $criteriaWeights[$criteria] * $subWeight;
            }
        }
        return $globalWeights;
    }


    /**
     * Buat record hasil untuk user
     */
    private function createUserResult()
    {
        return UserResult::create([
            'user_id' => Auth::user()->id,
        ]);
    }

    /**
     * Mendapatkan Random Index untuk perhitungan CR
     */
    private function getRandomIndex($n)
    {
        // Definisikan Random Index untuk berbagai ukuran matriks
        $randomIndexes = [
            1 => 0.00,
            2 => 0.00,
            3 => 0.58,
            4 => 0.90,
            5 => 1.12,
            6 => 1.24,
            7 => 1.32,
            8 => 1.41,
            9 => 1.45,
            10 => 1.49,
            11 => 1.51,
            12 => 1.54,
            13 => 1.56,
            14 => 1.57,
            15 => 1.59
        ];

        return $randomIndexes[$n] ?? 1.60;  // Default value for n > 15
    }
}
