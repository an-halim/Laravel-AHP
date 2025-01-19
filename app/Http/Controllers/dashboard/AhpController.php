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

    public function calculateAHP(Request $request)
    {
        // Ambil data comparison dari request atau preset
        $comparison = $request->input('comparison', []);
        $subComparison = $request->input('subComparison', []);

        // Extract unique criteria keys (both outer and inner)
        $criteria = array_unique(array_merge(
            array_keys($comparison), // Get outer keys (e.g., 'HARGA', 'WATT', 'GARANSI')
            array_keys(array_merge(...array_values($comparison))) // Get all inner keys (e.g., 'WATT', 'GARANSI', 'KAPASITAS')
        ));

        // Inisialisasi matriks kosong dan pastikan semua kriteria ada dalam matriks
        $matrixCriteria = [];
        foreach ($criteria as $row) {
            foreach ($criteria as $col) {
                // Set default value to 1 if no value is provided in comparison
                $matrixCriteria[$row][$col] = $comparison[$row][$col] ?? 1;
            }
        }

        // Normalisasi matriks
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

        // Hitung matriks bobot
        $weightedMatrixCriteria = [];
        foreach ($normalizedMatrixCriteria as $row => $values) {
            foreach ($values as $col => $value) {
                $weightedMatrixCriteria[$row][$col] = $value * $priorityVectorCriteria[$col];
            }
        }

        // Hitung Lambda Max
        $lambdaMaxCriteria = 0;
        foreach ($priorityVectorCriteria as $row => $priority) {
            $lambdaMaxCriteria += array_sum($weightedMatrixCriteria[$row]) / $priority;
        }
        $lambdaMaxCriteria /= count($priorityVectorCriteria);

        // Hitung Consistency Index (CI)
        $nCriteria = count($priorityVectorCriteria);
        $ciCriteria = ($lambdaMaxCriteria - $nCriteria) / ($nCriteria - 1);

        // Hitung Consistency Ratio (CR)
        $randomIndex = [
            1 => 0, 2 => 0, 3 => 0.58, 4 => 0.9, 5 => 1.12, 6 => 1.24, 7 => 1.32, 8 => 1.41,
        ];
        $crCriteria = $ciCriteria / ($randomIndex[$nCriteria] ?? 1);


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

            // Normalisasi matriks
            $columnSums = array_fill_keys($criteriaKeys, 0);
            foreach ($matrix as $row => $values) {
                foreach ($values as $col => $value) {
                    $columnSums[$col] += $value;
                }
            }

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

            // Hitung weighted matrix
            $weightedMatrix = [];
            foreach ($matrix as $row => $values) {
                foreach ($values as $col => $value) {
                    $weightedMatrix[$row][$col] = $value * $priorityVector[$col];
                }
            }

            // Hitung lambda max
            $lambdaMax = 0;
            foreach ($criteriaKeys as $row) {
                $weightedSum = array_sum($weightedMatrix[$row]);
                $lambdaMax += $weightedSum / $priorityVector[$row];
            }
            $lambdaMax /= count($criteriaKeys);

            // Hitung CI dan CR
            $n = count($criteriaKeys);
            $ci = ($lambdaMax - $n) / ($n - 1);
            $cr = $randomIndex[$n] > 0 ? $ci / $randomIndex[$n] : 0;

            // Simpan hasil untuk setiap kriteria
            $results[$criteriaName] = [
                'matrix' => $matrix,
                'normalizedMatrix' => $normalizedMatrix,
                'priorityVector' => $priorityVector,
                'weightedMatrix' => $weightedMatrix,
                'lambdaMax' => $lambdaMax,
                'ci' => $ci,
                'cr' => $cr,
            ];
        }


        $criteriaResult = (object) [
            'matrix' => $matrixCriteria,
            'normalizedMatrix' => $normalizedMatrix,
            'priorityVector' => $priorityVectorCriteria,
            'weightedMatrix' => $weightedMatrixCriteria,
            'lambdaMax' => $lambdaMaxCriteria,
            'ci' => $ciCriteria,
            'cr' => $crCriteria,
        ];


        $priorityVectorSubCriteria = [];
        foreach ($results as $key => $result) {
            $priorityVectorSubCriteria[$key] = $result['priorityVector'];
        }

        // Kirim hasil ke view
        return view('dashboard.ahp-process.ahp-process', compact('criteriaResult', 'results', 'priorityVectorSubCriteria'));
    }

    public function alternatives()
    {
        $alternatives = Alternative::Categorize();
        return view('dashboard.ahp-alternatif.ahp-alternatif', compact('alternatives'));
    }

    public function getRecommendation(Request $request)
    {
        DB::beginTransaction();
        // Ambil data dari request
        $subCriteriaWeights = json_decode($request->input('priorityVectorSubCriteria'), true);
        $criteriaWeights = json_decode($request->input('priorityVectorCriteria'), true);


        $products = Alternative::Categorize()->toArray();

        // Validasi data input
        if (empty($criteriaWeights) || empty($subCriteriaWeights) || empty($products)) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Data tidak lengkap');
        }

        // Hitung Bobot Global
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

        $userResult = UserResult::create([
            'user_id' => Auth::user()->id,
        ]);

        // Hitung Nilai Produk
        $productScores = [];
        foreach ($products as $product) {
            $score = 0;
            // Iterate through product attributes (harga, kapasitas, etc.)
            foreach ($product as $attribute => $value) {
                if (!is_array($value)) { // handle if value is not an array (its becasue the value get also from the association)
                    // Convert attribute and value to lowercase to handle case insensitivity
                    $attributeLower = strtolower($attribute);
                    $valueLower = strtolower($value);

                    // Check if the attribute matches the sub-criteria
                    if (isset($globalWeights[$attributeLower])) {
                        // Add global weight if exists
                        $score += $globalWeights[$attributeLower][$valueLower] ?? 0;  // Default 0 if no weight
                    }
                }
            }

            // Add all product fields along with the score
            $productScores[] = [
                'ahp' => $score,
                'user_result_id' => $userResult->id,
                'model' => $product['model'],
                'nama' => $product['nama'],
                'harga' => $product['harga'],
                'watt' => $product['watt'],
                'kapasitas' => $product['kapasitas'],
                'garansi' => $product['garansi'],
                'gambar' => $product['gambar'] ?? "https://via",
            ];
        }

        // Urutkan berdasarkan skor
        usort($productScores, function ($a, $b) {
            return $b['ahp'] <=> $a['ahp'];
        });


        // Hitung Lambda Max (λmax), CI, dan CR untuk validasi konsistensi
        $lambdaMax = $this->calculateLambdaMax($criteriaWeights, $subCriteriaWeights);
        $n = count($criteriaWeights);
        $ci = ($lambdaMax - $n) / ($n - 1);
        $randomIndex = $this->getRandomIndex($n);
        $cr = $randomIndex > 0 ? $ci / $randomIndex : 0;

        // Insert data ke database
        Hasil::insert($productScores);

        DB::commit();

        // Return hasil rekomendasi dan validasi konsistensi
        return redirect('/ahp/report/' . $userResult->id);
    }

    // Fungsi untuk menghitung Lambda Max
    private function calculateLambdaMax($criteriaWeights, $subCriteriaWeights)
    {
        $lambdaMax = 0;
        foreach ($criteriaWeights as $criteria => $weight) {
            if (isset($subCriteriaWeights[$criteria])) {
                $subWeights = $subCriteriaWeights[$criteria];
                foreach ($subWeights as $subName => $subWeight) {
                    $lambdaMax += $weight * $subWeight;
                }
            }
        }
        return $lambdaMax;
    }

    // Fungsi untuk mendapatkan Random Index (RI)
    private function getRandomIndex($n)
    {
        $randomIndex = [
            1 => 0.00, 2 => 0.00, 3 => 0.58, 4 => 0.90,
            5 => 1.12, 6 => 1.24, 7 => 1.32, 8 => 1.41,
            9 => 1.45, 10 => 1.49
        ];
        return $randomIndex[$n] ?? 1.49; // Default untuk n > 10
    }
}
