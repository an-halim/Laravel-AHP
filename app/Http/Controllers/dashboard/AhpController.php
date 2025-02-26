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

    public function ahpCompareSubCriteria()
    {
        $criteria = Criteria::all();
        $criteriaWithSubCriterias = Criteria::with('subCriterias')->get();
        // Format the output
        $subCriteria = $criteriaWithSubCriterias->mapWithKeys(function ($criteria) {
            return [$criteria->name => $criteria->subCriterias->pluck('name')->toArray()];
        });

        return view('dashboard.ahp-pembobotansub.ahp-pembobotansub', compact('criteria', 'subCriteria'));
    }

    // public function calculateAHP(Request $request)
    // {
    //     // Ambil data comparison dari request atau preset
    //     $comparison = $request->input('comparison', []);
    //     $subComparison = $request->input('subComparison', []);

    //     // Extract unique criteria keys (both outer and inner)
    //     $criteria = array_unique(array_merge(
    //         array_keys($comparison), // Get outer keys (e.g., 'HARGA', 'WATT', 'GARANSI')
    //         array_keys(array_merge(...array_values($comparison))) // Get all inner keys (e.g., 'WATT', 'GARANSI', 'KAPASITAS')
    //     ));

    //     // Inisialisasi matriks kosong dan pastikan semua kriteria ada dalam matriks
    //     $matrixCriteria = [];
    //     foreach ($criteria as $row) {
    //         foreach ($criteria as $col) {
    //             // Set default value to 1 if no value is provided in comparison
    //             $matrixCriteria[$row][$col] = $comparison[$row][$col] ?? 1;
    //         }
    //     }

    //     // Normalisasi matriks
    //     $columnSums = array_fill_keys($criteria, 0);
    //     foreach ($matrixCriteria as $row => $values) {
    //         foreach ($values as $col => $value) {
    //             $columnSums[$col] += $value;
    //         }
    //     }

    //     // Normalisasi matriks
    //     $normalizedMatrixCriteria = [];
    //     foreach ($matrixCriteria as $row => $values) {
    //         foreach ($values as $col => $value) {
    //             $normalizedMatrixCriteria[$row][$col] = $value / $columnSums[$col];
    //         }
    //     }

    //     // Hitung rata-rata setiap baris (priority vector)
    //     $priorityVectorCriteria = [];
    //     foreach ($normalizedMatrixCriteria as $row => $values) {
    //         $priorityVectorCriteria[$row] = array_sum($values) / count($values);
    //     }

    //     // Hitung matriks bobot
    //     $weightedMatrixCriteria = [];
    //     foreach ($normalizedMatrixCriteria as $row => $values) {
    //         foreach ($values as $col => $value) {
    //             $weightedMatrixCriteria[$row][$col] = $value * $priorityVectorCriteria[$col];
    //         }
    //     }

    //     // Hitung Lambda Max
    //     $lambdaMaxCriteria = 0;
    //     foreach ($priorityVectorCriteria as $row => $priority) {
    //         $lambdaMaxCriteria += array_sum($weightedMatrixCriteria[$row]) / $priority;
    //     }
    //     $lambdaMaxCriteria /= count($priorityVectorCriteria);

    //     // Hitung Consistency Index (CI)
    //     $nCriteria = count($priorityVectorCriteria);
    //     $ciCriteria = ($lambdaMaxCriteria - $nCriteria) / ($nCriteria - 1);

    //     // Hitung Consistency Ratio (CR)
    //     $randomIndex = $this->getRandomIndex($nCriteria);
    //     $crCriteria = $ciCriteria / ($randomIndex ?? 1);


    //     $results = [];
    //     foreach ($subComparison as $criteriaName => $comparisons) {
    //         // Ambil semua sub-kriteria yang unik
    //         $criteriaKeys = array_keys($comparisons);

    //         // Tambahkan kunci dari setiap sub-array
    //         foreach ($comparisons as $subArray) {
    //             $criteriaKeys = array_merge($criteriaKeys, array_keys($subArray));
    //         }

    //         // Pastikan kunci unik
    //         $criteriaKeys = array_unique($criteriaKeys);

    //         // Inisialisasi matriks
    //         $matrix = [];
    //         foreach ($criteriaKeys as $row) {
    //             foreach ($criteriaKeys as $col) {
    //                 $matrix[$row][$col] = $comparisons[$row][$col] ?? 1;
    //             }
    //         }

    //         // Normalisasi matriks
    //         $columnSums = array_fill_keys($criteriaKeys, 0);
    //         foreach ($matrix as $row => $values) {
    //             foreach ($values as $col => $value) {
    //                 $columnSums[$col] += $value;
    //             }
    //         }

    //         $normalizedMatrix = [];
    //         foreach ($matrix as $row => $values) {
    //             foreach ($values as $col => $value) {
    //                 $normalizedMatrix[$row][$col] = $value / $columnSums[$col];
    //             }
    //         }

    //         // Hitung priority vector
    //         $priorityVector = [];
    //         foreach ($normalizedMatrix as $row => $values) {
    //             $priorityVector[$row] = array_sum($values) / count($values);
    //         }

    //         // Hitung weighted matrix
    //         $weightedMatrix = [];
    //         foreach ($matrix as $row => $values) {
    //             foreach ($values as $col => $value) {
    //                 $weightedMatrix[$row][$col] = $value * $priorityVector[$col];
    //             }
    //         }

    //         // Hitung lambda max
    //         $lambdaMax = 0;
    //         foreach ($criteriaKeys as $row) {
    //             $weightedSum = array_sum($weightedMatrix[$row]);
    //             $lambdaMax += $weightedSum / $priorityVector[$row];
    //         }
    //         $lambdaMax /= count($criteriaKeys);

    //         // Hitung CI dan CR
    //         $n = count($criteriaKeys);
    //         $ci = ($lambdaMax - $n) / ($n - 1);
    //         $cr = $randomIndex[$n] > 0 ? $ci / $randomIndex[$n] : 0;

    //         // Simpan hasil untuk setiap kriteria
    //         $results[$criteriaName] = [
    //             'matrix' => $matrix,
    //             'normalizedMatrix' => $normalizedMatrix,
    //             'priorityVector' => $priorityVector,
    //             'weightedMatrix' => $weightedMatrix,
    //             'lambdaMax' => $lambdaMax,
    //             'ci' => $ci,
    //             'cr' => $cr,
    //         ];
    //     }


    //     $criteriaResult = (object) [
    //         'matrix' => $matrixCriteria,
    //         'normalizedMatrix' => $normalizedMatrix,
    //         'priorityVector' => $priorityVectorCriteria,
    //         'weightedMatrix' => $weightedMatrixCriteria,
    //         'lambdaMax' => $lambdaMaxCriteria,
    //         'ci' => $ciCriteria,
    //         'cr' => $crCriteria,
    //     ];


    //     $priorityVectorSubCriteria = [];
    //     foreach ($results as $key => $result) {
    //         $priorityVectorSubCriteria[$key] = $result['priorityVector'];
    //     }

    //     // Kirim hasil ke view
    //     return view('dashboard.ahp-process.ahp-process', compact('criteriaResult', 'results', 'priorityVectorSubCriteria'));
    // }

    public function alternatives()
    {
        $alternatives = Alternative::all();
        return view('dashboard.ahp-alternatif.ahp-alternatif', compact('alternatives'));
    }

    // public function getRecommendation(Request $request)
    // {
    //     DB::beginTransaction();
    //     // Ambil data dari request
    //     $subCriteriaWeights = json_decode($request->input('priorityVectorSubCriteria'), true);
    //     $criteriaWeights = json_decode($request->input('priorityVectorCriteria'), true);


    //     $products = Alternative::Categorize()->toArray();

    //     // Validasi data input
    //     if (empty($criteriaWeights) || empty($subCriteriaWeights) || empty($products)) {
    //         DB::rollBack();
    //         return redirect()->back()->with('error', 'Data tidak lengkap');
    //     }

    //     // Hitung Bobot Global
    //     $globalWeights = [];
    //     foreach ($subCriteriaWeights as $criteria => $subs) {
    //         foreach ($subs as $subName => $subWeight) {
    //             // Convert both criteria and subName to lowercase to handle case insensitivity
    //             $criteriaLower = strtolower($criteria);
    //             $subNameLower = strtolower($subName);

    //             // Bobot global = bobot kriteria * bobot sub-kriteria
    //             $globalWeights[$criteriaLower][$subNameLower] = $criteriaWeights[$criteria] * $subWeight;
    //         }
    //     }

    //     $userResult = UserResult::create([
    //         'user_id' => Auth::user()->id,
    //     ]);

    //     // Hitung Nilai Produk
    //     $productScores = [];
    //     foreach ($products as $product) {
    //         $score = 0;
    //         // Iterate through product attributes (harga, kapasitas, etc.)
    //         foreach ($product as $attribute => $value) {
    //             if (!is_array($value)) { // handle if value is not an array (its becasue the value get also from the association)
    //                 // Convert attribute and value to lowercase to handle case insensitivity
    //                 $attributeLower = strtolower($attribute);
    //                 $valueLower = strtolower($value);

    //                 // Check if the attribute matches the sub-criteria
    //                 if (isset($globalWeights[$attributeLower])) {
    //                     // Add global weight if exists
    //                     $score += $globalWeights[$attributeLower][$valueLower] ?? 0;  // Default 0 if no weight
    //                 }
    //             }
    //         }

    //         // Add all product fields along with the score
    //         $productScores[] = [
    //             'ahp' => $score,
    //             'user_result_id' => $userResult->id,
    //             'model' => $product['model'],
    //             'nama' => $product['nama'],
    //             'harga' => $product['harga'],
    //             'watt' => $product['watt'],
    //             'kapasitas' => $product['kapasitas'],
    //             'garansi' => $product['garansi'],
    //             'gambar' => $product['gambar'] ?? "https://via",
    //         ];
    //     }

    //     // Urutkan berdasarkan skor
    //     usort($productScores, function ($a, $b) {
    //         return $b['ahp'] <=> $a['ahp'];
    //     });


    //     // Hitung Lambda Max (λmax), CI, dan CR untuk validasi konsistensi
    //     $lambdaMax = $this->calculateLambdaMax($criteriaWeights, $subCriteriaWeights);
    //     $n = count($criteriaWeights);
    //     $ci = ($lambdaMax - $n) / ($n - 1);
    //     $randomIndex = $this->getRandomIndex($n);
    //     $cr = $randomIndex > 0 ? $ci / $randomIndex : 0;

    //     // Insert data ke database
    //     Hasil::insert($productScores);

    //     DB::commit();

    //     // Return hasil rekomendasi dan validasi konsistensi
    //     return redirect('/ahp/report/' . $userResult->id);
    // }

    // // Fungsi untuk menghitung Lambda Max
    // private function calculateLambdaMax($criteriaWeights, $subCriteriaWeights)
    // {
    //     $lambdaMax = 0;
    //     foreach ($criteriaWeights as $criteria => $weight) {
    //         if (isset($subCriteriaWeights[$criteria])) {
    //             $subWeights = $subCriteriaWeights[$criteria];
    //             foreach ($subWeights as $subName => $subWeight) {
    //                 $lambdaMax += $weight * $subWeight;
    //             }
    //         }
    //     }
    //     return $lambdaMax;
    // }

    // // Fungsi untuk mendapatkan Random Index (RI)
    // private function getRandomIndex($n)
    // {
    //     $randomIndex = [
    //         1 => 0.00, 2 => 0.00, 3 => 0.58, 4 => 0.90,
    //         5 => 1.12, 6 => 1.24, 7 => 1.32, 8 => 1.41,
    //         9 => 1.45, 10 => 1.49
    //     ];
    //     return $randomIndex[$n] ?? 1.49; // Default untuk n > 10
    // }



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

        // dd($criteriaResult);

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

            // Inisialisasi matriks
            $matrix = [];
            foreach ($criteriaKeys as $row) {
                foreach ($criteriaKeys as $col) {
                    $matrix[$row][$col] = $comparisons[$row][$col] ?? 1;
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

            // Hitung weighted sum vector (menggunakan matriks asli)
            $weightedSumVector = [];
            foreach ($matrix as $row => $values) {
                $weightedSumVector[$row] = 0;
                foreach ($values as $col => $value) {
                    $weightedSumVector[$row] += $value * $priorityVector[$col];
                }
            }

            // Hitung lambda max dengan metode standar
            $lambdaMax = 0;
            foreach ($criteriaKeys as $row) {
                $lambdaMax += $weightedSumVector[$row] / $priorityVector[$row];
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

            $products = Alternative::Categorize()->toArray();

            // Validasi data input
            if (empty($criteriaWeights) || empty($subCriteriaWeights) || empty($products)) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Data tidak lengkap');
            }

            // Validasi konsistensi (CR harus <= 0.1 untuk dianggap konsisten)
            $isConsistent = $this->validateConsistency($criteriaWeights, $subCriteriaWeights);
            if (!$isConsistent) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Consistency Ratio terlalu tinggi (>0.1). Matriks perbandingan tidak konsisten.');
            }

            // Hitung bobot global untuk setiap sub kriteria
            $globalWeights = $this->calculateGlobalWeights($criteriaWeights, $subCriteriaWeights);

            // Buat record hasil untuk user
            $userResult = $this->createUserResult();

            // Hitung dan urutkan skor produk
            $productScores = $this->calculateProductScores($products, $globalWeights, $userResult->id);

            // Simpan hasil ke database
            Hasil::insert($productScores);

            DB::commit();

            // Return hasil rekomendasi
            return redirect('/ahp/report/' . $userResult->id);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
     * Hitung bobot global untuk setiap sub kriteria
     */
    private function calculateGlobalWeights($criteriaWeights, $subCriteriaWeights)
    {
        $globalWeights = [];
        foreach ($subCriteriaWeights as $criteria => $subs) {
            foreach ($subs as $subName => $subWeight) {
                // Convert both criteria and subName to lowercase to handle case insensitivity
                $criteriaLower = strtolower($criteria);
                $subNameLower = strtolower($subName);

                // Bobot global = bobot kriteria * bobot sub-kriteria
                $globalWeights[$criteriaLower][$subNameLower] = $criteriaWeights[$criteria] * $subWeight;
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
     * Hitung dan urutkan skor produk
     */
    private function calculateProductScores($products, $globalWeights, $userResultId)
    {
        $productScores = [];
        foreach ($products as $product) {
            $score = 0;
            // Iterate through product attributes (harga, kapasitas, etc.)
            foreach ($product as $attribute => $value) {
                if (!is_array($value)) { // handle if value is not an array
                    // Convert attribute and value to lowercase to handle case insensitivity
                    $attributeLower = strtolower($attribute);
                    $valueLower = strtolower($value);

                    // Check if the attribute matches the sub-criteria
                    if (isset($globalWeights[$attributeLower][$valueLower])) {
                        // Add global weight if exists
                        $score += $globalWeights[$attributeLower][$valueLower];
                    }
                }
            }

            // Add all product fields along with the score
            $productScores[] = [
                'ahp' => $score,
                'user_result_id' => $userResultId,
                'model' => $product['model'],
                'nama' => $product['nama'],
                'harga' => $product['harga'],
                'watt' => $product['watt'],
                'kapasitas' => $product['kapasitas'],
                'garansi' => $product['garansi'],
                'gambar' => $product['gambar'] ?? "https://via",
            ];
        }

        // Urutkan berdasarkan skor (dari tertinggi ke terendah)
        usort($productScores, function ($a, $b) {
            return $b['ahp'] <=> $a['ahp'];
        });

        return $productScores;
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
