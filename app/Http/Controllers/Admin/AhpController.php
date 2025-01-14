<?php

namespace App\Http\Controllers\Admin;

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

    public function indexbobot()
    {
        $criteria = Criteria::all();
        return view('content.bobot.bobot', compact('criteria'));
    }

    public function indexbobotsub()
    {
        // Retrieve all Criteria with their related SubCriteria
        $criteriaWithSubCriterias = Criteria::with('subCriterias')->get();

        // Format the output
        $subCriteria = $criteriaWithSubCriterias->mapWithKeys(function ($criteria) {
            return [$criteria->name => $criteria->subCriterias->pluck('name')->toArray()];
        });

        return view('content.bobot-sub.bobot-sub', compact('subCriteria'));
    }

    public function indexperhitungan()
    {
        return view('admin/package/ahp/perhitungan');
    }

    public function indexhasil()
    {
        return view('admin/package/ahp/hasil');
    }

    public function tampilalternative()
    {
        $data_rumah = Alternative::get();
        $data_crt = SubCriteria::select('name')->distinct()->get();
        return view('content.ahp-alternatif.ahp-alternatif', [
            'data_rumah' => $data_rumah,
            'data_crt' => $data_crt,
            'alternatifs' => $data_rumah,
        ]);
    }

    public function postbobot(Request $request)
    {
        // // proses matriks
        // $h = 1;
        // $g = 1;
        // $s = 1;
        // $k = 1;
        // $l = 1;
        // $hg = $request->cbhg;
        // $hs = $request->cbhs;
        // $hk = $request->cbhk;
        // $hl = $request->cbhl;
        // $gh = $request->cbgh;
        // $gs = $request->cbgs;
        // $gk = $request->cbgk;
        // $gl = $request->cbgl;
        // $sh = $request->cbsh;
        // $sg = $request->cbsg;
        // $sk = $request->cbsk;
        // $sl = $request->cbsl;
        // $kh = $request->cbkh;
        // $kg = $request->cbkg;
        // $ks = $request->cbks;
        // $kl = $request->cbkl;
        // $lh = $request->cblh;
        // $lg = $request->cblg;
        // $lk = $request->cblk;
        // $ls = $request->cbls;

        // // bentuk kolom kiri -> kanan
        // (float) $k1 = $l;
        // (float) $k2 = $kl / $lk;
        // (float) $k3 = $sl / $ls;
        // (float) $k4 = $hl / $lh;
        // (float) $k5 = $gl / $lg;
        // (float) $k6 = $lk / $kl;
        // (float) $k7 = $k;
        // (float) $k8 = $sk / $ks;
        // (float) $k9 = $hk / $kh;
        // (float) $k10 = $gk / $kg;
        // (float) $k11 = $ls / $sl;
        // (float) $k12 = $ks / $sk;
        // (float) $k13 = $s;
        // (float) $k14 = $hs / $sh;
        // (float) $k15 = $gs / $sg;
        // (float) $k16 = $lh / $hl;
        // (float) $k17 = $kh / $hk;
        // (float) $k18 = $sh / $hs;
        // (float) $k19 = $h;
        // (float) $k20 = $gh / $hg;
        // (float) $k21 = $lg / $gl;
        // (float) $k22 = $kg / $gk;
        // (float) $k23 = $sg / $gs;
        // (float) $k24 = $hg / $gh;
        // (float) $k25 = $g;
        // (float) $k26 = $k1 + $k6 + $k11 + $k16 + $k21;
        // (float) $k27 = $k2 + $k7 + $k12 + $k17 + $k22;
        // (float) $k28 = $k3 + $k8 + $k13 + $k18 + $k23;
        // (float) $k29 = $k4 + $k9 + $k14 + $k19 + $k24;
        // (float) $k30 = $k5 + $k10 + $k15 + $k20 + $k25;

        // return view('content.matrix1.matrix1', [
        //     'k1' => $k1,
        //     'k2' => $k2,
        //     'k3' => $k3,
        //     'k4' => $k4,
        //     'k5' => $k5,
        //     'k6' => $k6,
        //     'k7' => $k7,
        //     'k8' => $k8,
        //     'k9' => $k9,
        //     'k10' => $k10,
        //     'k11' => $k11,
        //     'k12' => $k12,
        //     'k13' => $k13,
        //     'k14' => $k14,
        //     'k15' => $k15,
        //     'k16' => $k16,
        //     'k17' => $k17,
        //     'k18' => $k18,
        //     'k19' => $k19,
        //     'k20' => $k20,
        //     'k21' => $k21,
        //     'k22' => $k22,
        //     'k23' => $k23,
        //     'k24' => $k24,
        //     'k25' => $k25,
        //     'k26' => $k26,
        //     'k27' => $k27,
        //     'k28' => $k28,
        //     'k29' => $k29,
        //     'k30' => $k30
        // ]);

        // Ambil data comparison dari request
        $comparisonData = $request->input('comparison', []);
        // dd($request->all());

        // Inisialisasi matriks pembobotan
        $matrix = [];
        $criteria = array_keys($comparisonData); // Ambil nama kriteria utama (e.g., 'Harga', 'Garasi', dst.)

        // Buat matriks perbandingan
        foreach ($criteria as $criterion1) {
            foreach ($criteria as $criterion2) {
                if ($criterion1 === $criterion2) {
                    // Jika kriteria sama, nilai diagonal matriks adalah 1
                    $matrix[$criterion1][$criterion2] = 1;
                } elseif (isset($comparisonData[$criterion1][$criterion2])) {
                    // Jika ada perbandingan yang diberikan, gunakan nilai dari comparison
                    $matrix[$criterion1][$criterion2] = $comparisonData[$criterion1][$criterion2];
                } elseif (isset($comparisonData[$criterion2][$criterion1])) {
                    // Jika arah sebaliknya ada, gunakan kebalikan nilai (1/nilai)
                    $matrix[$criterion1][$criterion2] = 1 / $comparisonData[$criterion2][$criterion1];
                } else {
                    // Jika tidak ada data, nilai default adalah 1
                    $matrix[$criterion1][$criterion2] = 1;
                }
            }
        }

        // Hitung total kolom
        $columnSums = [];
        foreach ($criteria as $criterion) {
            $columnSums[$criterion] = array_sum(array_column($matrix, $criterion));
        }

        // Normalisasi matriks
        $normalizedMatrix = [];
        foreach ($criteria as $criterion1) {
            foreach ($criteria as $criterion2) {
                $normalizedMatrix[$criterion1][$criterion2] = $matrix[$criterion1][$criterion2] / $columnSums[$criterion2];
            }
        }

        // Hitung bobot kriteria (rata-rata per baris normalisasi)
        $weights = [];
        foreach ($criteria as $criterion) {
            $weights[$criterion] = array_sum($normalizedMatrix[$criterion]) / count($criteria);
        }

        // dd($matrix, $normalizedMatrix, $weights);
        // Kirim hasil ke view
        return view('content.matrix1.matrix1', [
            'matrix' => $matrix,
            'normalizedMatrix' => $normalizedMatrix,
            'weights' => $weights,
        ]);
    }

    public function postmatriks(Request $request)
    {
        $t1 = $request->k1;
        $t2 = $request->k2;
        $t3 = $request->k3;
        $t4 = $request->k4;
        $t5 = $request->k5;
        $t6 = $request->k6;
        $t7 = $request->k7;
        $t8 = $request->k8;
        $t9 = $request->k9;
        $t10 = $request->k10;
        $t11 = $request->k11;
        $t12 = $request->k12;
        $t13 = $request->k13;
        $t14 = $request->k14;
        $t15 = $request->k15;
        $t16 = $request->k16;
        $t17 = $request->k17;
        $t18 = $request->k18;
        $t19 = $request->k19;
        $t20 = $request->k20;
        $t21 = $request->k21;
        $t22 = $request->k22;
        $t23 = $request->k23;
        $t24 = $request->k24;
        $t25 = $request->k25;
        $t26 = $request->k26;
        $t27 = $request->k27;
        $t28 = $request->k28;
        $t29 = $request->k29;
        $t30 = $request->k30;

        // Data Buat kolom
        (float) $k1 = $t1 / $t26;
        (float) $k2 = $t2 / $t27;
        (float) $k3 = $t3 / $t28;
        (float) $k4 = $t4 / $t29;
        (float) $k5 = $t5 / $t30;
        (float) $k6 = $t6 / $t26;
        (float) $k7 = $t7 / $t27;
        (float) $k8 = $t8 / $t28;
        (float) $k9 = $t9 / $t29;
        (float) $k10 = $t10 / $t30;
        (float) $k11 = $t11 / $t26;
        (float) $k12 = $t12 / $t27;
        (float) $k13 = $t13 / $t28;
        (float) $k14 = $t14 / $t29;
        (float) $k15 = $t15 / $t30;
        (float) $k16 = $t16 / $t26;
        (float) $k17 = $t17 / $t27;
        (float) $k18 = $t18 / $t28;
        (float) $k19 = $t19 / $t29;
        (float) $k20 = $t20 / $t30;
        (float) $k21 = $t21 / $t26;
        (float) $k22 = $t22 / $t27;
        (float) $k23 = $t23 / $t28;
        (float) $k24 = $t24 / $t29;
        (float) $k25 = $t25 / $t30;
        $k26 = $k1 + $k6 + $k11 + $k16 + $k21;
        $k27 = $k2 + $k7 + $k12 + $k17 + $k22;
        $k28 = $k3 + $k8 + $k13 + $k18 + $k23;
        $k29 = $k4 + $k9 + $k14 + $k19 + $k24;
        $k30 = $k5 + $k10 + $k15 + $k20 + $k25;

        return view('content.matrix2.matrix2', [
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
            'k4' => $k4,
            'k5' => $k5,
            'k6' => $k6,
            'k7' => $k7,
            'k8' => $k8,
            'k9' => $k9,
            'k10' => $k10,
            'k11' => $k11,
            'k12' => $k12,
            'k13' => $k13,
            'k14' => $k14,
            'k15' => $k15,
            'k16' => $k16,
            'k17' => $k17,
            'k18' => $k18,
            'k19' => $k19,
            'k20' => $k20,
            'k21' => $k21,
            'k22' => $k22,
            'k23' => $k23,
            'k24' => $k24,
            'k25' => $k25,
            'k26' => round($k26),
            'k27' => round($k27),
            'k28' => round($k28),
            'k29' => round($k29),
            'k30' => round($k30)
        ]);
    }

    public function postmatriks2(Request $request)
    {
        $t1 = $request->k1;
        $t2 = $request->k2;
        $t3 = $request->k3;
        $t4 = $request->k4;
        $t5 = $request->k5;
        $t6 = $request->k6;
        $t7 = $request->k7;
        $t8 = $request->k8;
        $t9 = $request->k9;
        $t10 = $request->k10;
        $t11 = $request->k11;
        $t12 = $request->k12;
        $t13 = $request->k13;
        $t14 = $request->k14;
        $t15 = $request->k15;
        $t16 = $request->k16;
        $t17 = $request->k17;
        $t18 = $request->k18;
        $t19 = $request->k19;
        $t20 = $request->k20;
        $t21 = $request->k21;
        $t22 = $request->k22;
        $t23 = $request->k23;
        $t24 = $request->k24;
        $t25 = $request->k25;
        $t26 = $request->k26;
        $t27 = $request->k27;
        $t28 = $request->k28;
        $t29 = $request->k29;
        $t30 = $request->k30;

        // Data Buat kolom
        (float) $k1 = $t1;
        (float) $k2 = $t2;
        (float) $k3 = $t3;
        (float) $k4 = $t4;
        (float) $k5 = $t5;
        (float) $k6 = $t6;
        (float) $k7 = $t7;
        (float) $k8 = $t8;
        (float) $k9 = $t9;
        (float) $k10 = $t10;
        (float) $k11 = $t11;
        (float) $k12 = $t12;
        (float) $k13 = $t13;
        (float) $k14 = $t14;
        (float) $k15 = $t15;
        (float) $k16 = $t16;
        (float) $k17 = $t17;
        (float) $k18 = $t18;
        (float) $k19 = $t19;
        (float) $k20 = $t20;
        (float) $k21 = $t21;
        (float) $k22 = $t22;
        (float) $k23 = $t23;
        (float) $k24 = $t24;
        (float) $k25 = $t25;
        $k26 = $t26;
        $k27 = $t27;
        $k28 = $t28;
        $k29 = $t29;
        $k30 = $t30;
        $k31 = ($k1 + $k2 + $k3 + $k4 + $k5) / 5;
        $k32 = ($k6 + $k7 + $k8 + $k9 + $k10) / 5;
        $k33 = ($k11 + $k12 + $k13 + $k14 + $k15) / 5;
        $k34 = ($k16 + $k17 + $k18 + $k19 + $k20) / 5;
        $k35 = ($k21 + $k22 + $k23 + $k24 + $k25) / 5;

        // // Disini ngitung matriks nya....
        // $h1 = ($k1*$k31)+($k2*$k32)+($k3*$k33)+($k4*$k34)+($k5*$k35);
        // $h2 = ($k6*$k31)+($k7*$k32)+($k8*$k33)+($k9*$k34)+($k10*$k35);
        // $h3 = ($k11*$k31)+($k12*$k32)+($k13*$k33)+($k14*$k34)+($k15*$k35);
        // $h4 = ($k16*$k31)+($k17*$k32)+($k18*$k33)+($k19*$k34)+($k20*$k35);
        // $h5 = ($k21*$k31)+($k22*$k32)+($k23*$k33)+($k24*$k34)+($k25*$k35);

        // // Menghitung lambda max dulu ges
        // $lambdamax = ($h1+$h2+$h3+$h4+$h5)/5;

        // // Menghitung CI
        // $ci = ($lambdamax-5)/(5-1);

        // // Menghitung CR
        // $cr = $ci/5;

        return view('content.matrix3.matrix3', [
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
            'k4' => $k4,
            'k5' => $k5,
            'k6' => $k6,
            'k7' => $k7,
            'k8' => $k8,
            'k9' => $k9,
            'k10' => $k10,
            'k11' => $k11,
            'k12' => $k12,
            'k13' => $k13,
            'k14' => $k14,
            'k15' => $k15,
            'k16' => $k16,
            'k17' => $k17,
            'k18' => $k18,
            'k19' => $k19,
            'k20' => $k20,
            'k21' => $k21,
            'k22' => $k22,
            'k23' => $k23,
            'k24' => $k24,
            'k25' => $k25,
            'k26' => round($k26),
            'k27' => round($k27),
            'k28' => round($k28),
            'k29' => round($k29),
            'k30' => round($k30),
            'k31' => $k31,
            'k32' => $k32,
            'k33' => $k33,
            'k34' => $k34,
            'k35' => $k35
        ]);
    }

    public function cekkonsistensi(Request $request)
    {
        $t1 = $request->k1;
        $t2 = $request->k2;
        $t3 = $request->k3;
        $t4 = $request->k4;
        $t5 = $request->k5;
        $t6 = $request->k6;
        $t7 = $request->k7;
        $t8 = $request->k8;
        $t9 = $request->k9;
        $t10 = $request->k10;
        $t11 = $request->k11;
        $t12 = $request->k12;
        $t13 = $request->k13;
        $t14 = $request->k14;
        $t15 = $request->k15;
        $t16 = $request->k16;
        $t17 = $request->k17;
        $t18 = $request->k18;
        $t19 = $request->k19;
        $t20 = $request->k20;
        $t21 = $request->k21;
        $t22 = $request->k22;
        $t23 = $request->k23;
        $t24 = $request->k24;
        $t25 = $request->k25;
        $t26 = $request->k26;
        $t27 = $request->k27;
        $t28 = $request->k28;
        $t29 = $request->k29;
        $t30 = $request->k30;

        // Data Buat kolom
        (float) $k1 = $t1;
        (float) $k2 = $t2;
        (float) $k3 = $t3;
        (float) $k4 = $t4;
        (float) $k5 = $t5;
        (float) $k6 = $t6;
        (float) $k7 = $t7;
        (float) $k8 = $t8;
        (float) $k9 = $t9;
        (float) $k10 = $t10;
        (float) $k11 = $t11;
        (float) $k12 = $t12;
        (float) $k13 = $t13;
        (float) $k14 = $t14;
        (float) $k15 = $t15;
        (float) $k16 = $t16;
        (float) $k17 = $t17;
        (float) $k18 = $t18;
        (float) $k19 = $t19;
        (float) $k20 = $t20;
        (float) $k21 = $t21;
        (float) $k22 = $t22;
        (float) $k23 = $t23;
        (float) $k24 = $t24;
        (float) $k25 = $t25;
        $k26 = $t26;
        $k27 = $t27;
        $k28 = $t28;
        $k29 = $t29;
        $k30 = $t30;
        $k31 = ($k1 + $k2 + $k3 + $k4 + $k5) / 5;
        $k32 = ($k6 + $k7 + $k8 + $k9 + $k10) / 5;
        $k33 = ($k11 + $k12 + $k13 + $k14 + $k15) / 5;
        $k34 = ($k16 + $k17 + $k18 + $k19 + $k20) / 5;
        $k35 = ($k21 + $k22 + $k23 + $k24 + $k25) / 5;

        // Disini ngitung matriks nya....
        $h1 = ($k1 * $k31) + ($k2 * $k32) + ($k3 * $k33) + ($k4 * $k34) + ($k5 * $k35);
        $h2 = ($k6 * $k31) + ($k7 * $k32) + ($k8 * $k33) + ($k9 * $k34) + ($k10 * $k35);
        $h3 = ($k11 * $k31) + ($k12 * $k32) + ($k13 * $k33) + ($k14 * $k34) + ($k15 * $k35);
        $h4 = ($k16 * $k31) + ($k17 * $k32) + ($k18 * $k33) + ($k19 * $k34) + ($k20 * $k35);
        $h5 = ($k21 * $k31) + ($k22 * $k32) + ($k23 * $k33) + ($k24 * $k34) + ($k25 * $k35);

        // Menghitung lambda max dulu ges
        $lambdamax = ($h1 + $h2 + $h3 + $h4 + $h5) / 5;

        // Menghitung CI
        $ci = ($lambdamax - 5) / (5 - 1);

        // Menghitung CR
        $cr = $ci / 5;

        return view('content.consictensy.consictensy', [
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
            'k4' => $k4,
            'k5' => $k5,
            'k6' => $k6,
            'k7' => $k7,
            'k8' => $k8,
            'k9' => $k9,
            'k10' => $k10,
            'k11' => $k11,
            'k12' => $k12,
            'k13' => $k13,
            'k14' => $k14,
            'k15' => $k15,
            'k16' => $k16,
            'k17' => $k17,
            'k18' => $k18,
            'k19' => $k19,
            'k20' => $k20,
            'k21' => $k21,
            'k22' => $k22,
            'k23' => $k23,
            'k24' => $k24,
            'k25' => $k25,
            'k26' => round($k26),
            'k27' => round($k27),
            'k28' => round($k28),
            'k29' => round($k29),
            'k30' => round($k30),
            // Ini yang di ambil
            'k31' => $k31,
            'k32' => $k32,
            'k33' => $k33,
            'k34' => $k34,
            'k35' => $k35,
            'cr' => $cr
        ]);
    }

    // public function hasilrekomendasi(Request $request){
    public function posthasilrekomendasi(Request $request)
    {
        // Select data dulu
        $harga = Comparisons::select('harga')->orderBY('model', 'asc')->get();
        $lantai = Comparisons::select('watt')->orderBY('model', 'asc')->get();
        $luas = Comparisons::select('dayatahan')->orderBY('model', 'asc')->get();
        $kamar = Comparisons::select('kapasitas')->orderBY('model', 'asc')->get();

        // variabel penampung nilai kedalam array
        $datahargaarr = [];
        $datalantaiarr = [];
        $dataluasarr = [];
        $datakamararr = [];

        // buat masukin data kedalam bentuk array
        foreach ($harga as $itemh) {
            $datahargaarr[] = $itemh->harga;
        }

        foreach ($lantai as $iteml) {
            $datalantaiarr[] = $iteml->watt;
        }

        foreach ($luas as $items) {
            $dataluasarr[] = $items->dayatahan;
        }

        foreach ($kamar as $itemk) {
            $datakamararr[] = $itemk->kapasitas;
        }


        // buat manggil data arraynya
        $t31 = $request->k31;
        $t32 = $request->k32;
        $t33 = $request->k33;
        $t34 = $request->k34;
        $t35 = $request->k35;

        // kriteria harga
        $hasilh = [];
        $hasiljmlh = 0;
        $j = 0;
        $n = 0;
        $i = 0;
        // $z = 0;
        $D = 0;
        for ($m = 0; $m < (sizeof($datahargaarr) * sizeof($datahargaarr)) + (sizeof($datahargaarr) - 1); $m++) {
            if ($i < sizeof($datahargaarr)) {
                $hasilh[$n] = $datahargaarr[$i] / $datahargaarr[$j];
                $i++;
                $n++;
            } else if ($j < sizeof($datahargaarr)) {
                $j++;
                $i = 0;
            } else {
                // Do nothing
            }
        }

        // Jumlah kolom dan baris
        $barish = sizeof($datahargaarr);
        $kolomh = sizeof($datahargaarr);
        $data2Dh = array();

        // konversi jadi array 2d
        $counter = 0;
        for ($i = 0; $i < $barish; $i++) {
            for ($j = 0; $j < $kolomh; $j++) {
                $data2Dh[$i][$j] = $hasilh[$counter];
                $counter++;
            }
        }

        // menghitung jumlah
        $hasiljmlh = array();
        for ($i = 0; $i < $kolomh; $i++) {
            $jumlah = 0;
            for ($j = 0; $j < $barish; $j++) {
                $jumlah += $data2Dh[$j][$i];
            }
            $hasiljmlh[] = $jumlah;
        }

        // Menghitung normalisasi matriks
        $z = 0;
        $hasilbgh = [];
        $i = 0;
        for ($m = 0; $m < (sizeof($datahargaarr) * sizeof($datahargaarr)) + (sizeof($datahargaarr) - 1); $m++) {
            if ($i < sizeof($datahargaarr)) {
                $hasilbgh[$z] = $hasilh[$z] / $hasiljmlh[$i];
                $i++;
                $z++;
            } else {
                $i = 0;
            }
        }

        $counter = 0;
        for ($i = 0; $i < $barish; $i++) {
            for ($j = 0; $j < $kolomh; $j++) {
                $data2Dbgh[$i][$j] = $hasilbgh[$counter];
                $counter++;
            }
        }

        // Perkalian dengan hasil sebelumnya
        $z = 0;
        $hasiltmh = [];
        $i = 0;
        for ($j = 0; $j < $barish; $j++) {
            $jumlah = 0;
            for ($i = 0; $i < $kolomh; $i++) {
                $jumlah += $data2Dbgh[$j][$i];
            }
            $hasiltmh[] = $jumlah;
        }

        for ($i = 0; $i < sizeof($datahargaarr); $i++) {
            $jumlah = $hasiltmh[$i] / sizeof($datahargaarr);
            $hasilpmh[] = $jumlah;
        }

        // Perkalian (asli)
        for ($i = 0; $i < sizeof($datahargaarr); $i++) {
            $jumlah = $hasilpmh[$i] * $t34;
            $hasilppmh[] = $jumlah;
        }


        // kriteria lantai
        $hasill = [];
        $j = 0;
        $n = 0;
        $i = 0;
        for ($m = 0; $m < (sizeof($datalantaiarr) * sizeof($datalantaiarr)) + (sizeof($datalantaiarr) - 1); $m++) {
            if ($i < sizeof($datalantaiarr)) {
                $hasill[$n] = $datalantaiarr[$i] / $datalantaiarr[$j];
                $i++;
                $n++;
            } else {
                if ($j < sizeof($datalantaiarr)) {
                    $j++;
                    $i = 0;
                }
            }
        }

        // Jumlah kolom dan baris
        $barisl = sizeof($datalantaiarr);
        $koloml = sizeof($datalantaiarr);
        $data2Dl = array();

        // konversi jadi array 2d
        $counter = 0;
        for ($i = 0; $i < $barisl; $i++) {
            for ($j = 0; $j < $koloml; $j++) {
                $data2Dl[$i][$j] = $hasill[$counter];
                $counter++;
            }
        }

        // menghitung jumlah
        $hasiljmll = array();
        for ($i = 0; $i < $koloml; $i++) {
            $jumlah = 0;
            for ($j = 0; $j < $barisl; $j++) {
                $jumlah += $data2Dl[$j][$i];
            }
            $hasiljmll[] = $jumlah;
        }

        // Menghitung normalisasi matriks
        $z = 0;
        $hasilbgl = [];
        $i = 0;
        for ($m = 0; $m < (sizeof($datalantaiarr) * sizeof($datalantaiarr)) + (sizeof($datalantaiarr) - 1); $m++) {
            if ($i < sizeof($datalantaiarr)) {
                $hasilbgl[$z] = $hasill[$z] / $hasiljmll[$i];
                $i++;
                $z++;
            } else {
                $i = 0;
            }
        }

        $counter = 0;
        for ($i = 0; $i < $barisl; $i++) {
            for ($j = 0; $j < $koloml; $j++) {
                $data2Dbgl[$i][$j] = $hasilbgl[$counter];
                $counter++;
            }
        }

        // Perkalian dengan hasil sebelumnya
        $z = 0;
        $hasiltml = [];
        $i = 0;
        for ($j = 0; $j < $barisl; $j++) {
            $jumlah = 0;
            for ($i = 0; $i < $koloml; $i++) {
                $jumlah += $data2Dbgl[$j][$i];
            }
            $hasiltml[] = $jumlah;
        }

        for ($i = 0; $i < sizeof($datalantaiarr); $i++) {
            $jumlah = $hasiltml[$i] / sizeof($datalantaiarr);
            $hasilpml[] = $jumlah;
        }

        // Perkalian (asli)
        for ($i = 0; $i < sizeof($datalantaiarr); $i++) {
            $jumlah = $hasilpml[$i] * $t31;
            $hasilppml[] = $jumlah;
        }

        // kriteria luas
        $hasils = [];
        $j = 0;
        $n = 0;
        $i = 0;
        for ($m = 0; $m < (sizeof($dataluasarr) * sizeof($dataluasarr)) + (sizeof($dataluasarr) - 1); $m++) {
            if ($i < sizeof($dataluasarr)) {
                $hasils[$n] = $dataluasarr[$i] / $dataluasarr[$j];
                $i++;
                $n++;
            } else {
                if ($j < sizeof($dataluasarr)) {
                    $j++;
                    $i = 0;
                }
            }
        }

        // Jumlah kolom dan baris
        $bariss = sizeof($dataluasarr);
        $koloms = sizeof($dataluasarr);
        $data2Ds = array();

        // konversi jadi array 2d
        $counter = 0;
        for ($i = 0; $i < $bariss; $i++) {
            for ($j = 0; $j < $koloms; $j++) {
                $data2Ds[$i][$j] = $hasils[$counter];
                $counter++;
            }
        }

        // menghitung jumlah
        $hasiljmls = array();
        for ($i = 0; $i < $koloms; $i++) {
            $jumlah = 0;
            for ($j = 0; $j < $bariss; $j++) {
                $jumlah += $data2Ds[$j][$i];
            }
            $hasiljmls[] = $jumlah;
        }

        // Menghitung normalisasi matriks
        $z = 0;
        $hasilbgs = [];
        $i = 0;
        for ($m = 0; $m < (sizeof($dataluasarr) * sizeof($dataluasarr)) + (sizeof($dataluasarr) - 1); $m++) {
            if ($i < sizeof($dataluasarr)) {
                $hasilbgs[$z] = $hasils[$z] / $hasiljmls[$i];
                $i++;
                $z++;
            } else {
                $i = 0;
            }
        }

        $counter = 0;
        for ($i = 0; $i < $bariss; $i++) {
            for ($j = 0; $j < $koloms; $j++) {
                $data2Dbgs[$i][$j] = $hasilbgs[$counter];
                $counter++;
            }
        }

        // Perkalian dengan hasil sebelumnya
        $z = 0;
        $hasiltms = [];
        $i = 0;
        for ($j = 0; $j < $bariss; $j++) {
            $jumlah = 0;
            for ($i = 0; $i < $koloms; $i++) {
                $jumlah += $data2Dbgs[$j][$i];
            }
            $hasiltms[] = $jumlah;
        }

        for ($i = 0; $i < sizeof($dataluasarr); $i++) {
            $jumlah = $hasiltms[$i] / sizeof($dataluasarr);
            $hasilpms[] = $jumlah;
        }

        // Perkalian (asli)
        for ($i = 0; $i < sizeof($dataluasarr); $i++) {
            $jumlah = $hasilpms[$i] * $t33;
            $hasilppms[] = $jumlah;
        }

        // kriteria kamar
        $hasilk = [];
        $j = 0;
        $n = 0;
        $i = 0;
        for ($m = 0; $m < (sizeof($datakamararr) * sizeof($datakamararr)) + (sizeof($datakamararr) - 1); $m++) {
            if ($i < sizeof($datakamararr)) {
                $hasilk[$n] = $datakamararr[$i] / $datakamararr[$j];
                $i++;
                $n++;
            } else {
                if ($j < sizeof($datakamararr)) {
                    $j++;
                    $i = 0;
                }
            }
        }

        // Jumlah kolom dan baris
        $barisk = sizeof($datakamararr);
        $kolomk = sizeof($datakamararr);
        $data2Dk = array();

        // konversi jadi array 2d
        $counter = 0;
        for ($i = 0; $i < $barisk; $i++) {
            for ($j = 0; $j < $kolomk; $j++) {
                $data2Dk[$i][$j] = $hasilk[$counter];
                $counter++;
            }
        }

        // menghitung jumlah
        $hasiljmlk = array();
        for ($i = 0; $i < $kolomk; $i++) {
            $jumlah = 0;
            for ($j = 0; $j < $barisk; $j++) {
                $jumlah += $data2Dk[$j][$i];
            }
            $hasiljmlk[] = $jumlah;
        }

        // Menghitung normalisasi matriks
        $z = 0;
        $hasilbgk = [];
        $i = 0;
        for ($m = 0; $m < (sizeof($datakamararr) * sizeof($datakamararr)) + (sizeof($datakamararr) - 1); $m++) {
            if ($i < sizeof($datakamararr)) {
                $hasilbgk[$z] = $hasilk[$z] / $hasiljmlk[$i];
                $i++;
                $z++;
            } else {
                $i = 0;
            }
        }

        $counter = 0;
        for ($i = 0; $i < $barisk; $i++) {
            for ($j = 0; $j < $kolomk; $j++) {
                $data2Dbgk[$i][$j] = $hasilbgk[$counter];
                $counter++;
            }
        }

        // Perkalian dengan hasil sebelumnya
        $z = 0;
        $hasiltmk = [];
        $i = 0;
        for ($j = 0; $j < $barisk; $j++) {
            $jumlah = 0;
            for ($i = 0; $i < $kolomk; $i++) {
                $jumlah += $data2Dbgk[$j][$i];
            }
            $hasiltmk[] = $jumlah;
        }

        for ($i = 0; $i < sizeof($datakamararr); $i++) {
            $jumlah = $hasiltmk[$i] / sizeof($datakamararr);
            $hasilpmk[] = $jumlah;
        }

        // Perkalian (asli)
        for ($i = 0; $i < sizeof($datakamararr); $i++) {
            $jumlah = $hasilpmk[$i] * $t32;
            $hasilppmk[] = $jumlah;
        }




        // Insert data ke table hasils
        $tipe = DB::table('alternatives')
            ->select('model')
            ->get();

        $hargat = DB::table('alternatives')
            ->select('harga')
            ->get();
        $lantait = DB::table('alternatives')
            ->select('dayatahan')
            ->get();
        $kamart = DB::table('alternatives')
            ->select('watt')
            ->get();
        $luast = DB::table('alternatives')
            ->select('kapasitas')
            ->get();
        $gambart = DB::table('alternatives')
            ->select('gambar')
            ->get();

        $nama = DB::table('alternatives')
            ->select('nama')
            ->get();


        for ($i = 0; $i < sizeof($datahargaarr); $i++) {
            $hasiljumlah[] = $hasilppmh[$i] + $hasilppml[$i] + $hasilppmk[$i] + $hasilppms[$i];
        }


        $userResult = UserResult::create([
            'user_id' => Auth::user()->id,
        ]);

        for ($i = 0; $i < sizeof($datahargaarr); $i++) {
            Hasil::create([
                'user_result_id' => $userResult->id,
                'model' => $tipe[$i]->model,
                'nama' => $nama[$i]->nama,
                'dayatahan' => $lantait[$i]->dayatahan,
                'watt' => $kamart[$i]->watt,
                'kapasitas' => $luast[$i]->kapasitas,
                'harga' => $hargat[$i]->harga,
                'gambar' => $gambart[$i]->gambar,
                'ahp' => $hasiljumlah[$i]
            ]);
        }


        $datahasil = DB::table('hasils')
            ->orderBy('ahp', 'desc')
            ->get();

        $datamax = DB::table('hasils')
            ->orderBy('ahp', 'desc')
            ->limit(1)
            ->get();

        return redirect('/ahp/report/' . $userResult->id);
    }

    public function postmatriksnew(Request $request)
    {
        // Ambil data comparison dari request atau preset
        $comparison = $request->input('comparison', []);

        // Inisialisasi matriks kosong
        $criteria = array_keys($comparison);
        $matrix = [];

        // Buat matriks awal berdasarkan comparison
        foreach ($criteria as $row) {
            foreach ($criteria as $col) {
                $matrix[$row][$col] = $comparison[$row][$col] ?? 1; // Default 1 jika tidak ada nilai
            }
        }

        // Normalisasi matriks
        $columnSums = array_fill_keys($criteria, 0);
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

        // Hitung rata-rata setiap baris (priority vector)
        $priorityVector = [];
        foreach ($normalizedMatrix as $row => $values) {
            $priorityVector[$row] = array_sum($values) / count($values);
        }

        return view('content.matrix2new.matrix2new', [
            'matrix' => $matrix,
            'normalizedMatrix' => $normalizedMatrix,
            'priorityVector' => $priorityVector,
        ]);
    }

    public function postmatriks2new(Request $request)
    {
        // Ambil data hasil normalisasi dari request
        $normalizedMatrix = $request->input('normalizedMatrix');
        $priorityVector = $request->input('priorityVector');

        // Hitung matriks bobot
        $weightedMatrix = [];
        foreach ($normalizedMatrix as $row => $values) {
            foreach ($values as $col => $value) {
                $weightedMatrix[$row][$col] = $value * $priorityVector[$col];
            }
        }

        // Hitung Lambda Max
        $lambdaMax = 0;
        foreach ($priorityVector as $row => $priority) {
            $lambdaMax += array_sum($weightedMatrix[$row]) / $priority;
        }
        $lambdaMax /= count($priorityVector);

        // Hitung Consistency Index (CI)
        $n = count($priorityVector);
        $ci = ($lambdaMax - $n) / ($n - 1);

        // Hitung Consistency Ratio (CR)
        $randomIndex = [
            1 => 0, 2 => 0, 3 => 0.58, 4 => 0.9, 5 => 1.12, 6 => 1.24, 7 => 1.32, 8 => 1.41,
        ];
        $cr = $ci / ($randomIndex[$n] ?? 1);

        return view('content.matrix3new.matrix3new', [
            'weightedMatrix' => $weightedMatrix,
            'lambdaMax' => $lambdaMax,
            'ci' => $ci,
            'cr' => $cr,
        ]);
    }

    public function postSubCriteria(Request $request)
    {
        // Ambil data comparison dari request atau preset
        $subComparison = $request->input('subComparison', []);

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

            // Simpan hasil untuk setiap kriteria
            $results[$criteriaName] = [
                'matrix' => $matrix,
                'normalizedMatrix' => $normalizedMatrix,
                'priorityVector' => $priorityVector,
            ];
        }

        // Tampilkan hasil
        return view('content.consictensy-sub.consictensy-sub', [
            'results' => $results,
        ]);
    }

    public function postSubCriterias(Request $request)
    {
        // Ambil data comparison dari request atau preset
        $subComparison = $request->input('subComparison', []);

        // Nilai RI (Random Index) untuk CR
        $randomIndex = [
            1 => 0.00, 2 => 0.00, 3 => 0.58, 4 => 0.90,
            5 => 1.12, 6 => 1.24, 7 => 1.32, 8 => 1.41,
            9 => 1.45, 10 => 1.49
        ];

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

        // Tampilkan hasil
        return view('content.consictensy-sub.consictensy-sub', [
            'results' => $results,
        ]);
    }


    public function calculateRecommendation(Request $request)
    {
        // Ambil data dari request
        $criteriaWeights = $request->input('criteriaWeights');
        $subCriteriaWeights = $request->input('subCriteriaWeights');
        $products = $request->input('products');

        // Hitung Lambda Max (λmax) untuk konsistensi
        $lambdaMax = $this->calculateLambdaMax($subCriteriaWeights);

        // Hitung Consistency Index (CI)
        $n = count($criteriaWeights);
        $ci = ($lambdaMax - $n) / ($n - 1);

        // Hitung Consistency Ratio (CR)
        $randomIndex = $this->getRandomIndex($n); // RI berdasarkan jumlah kriteria
        $cr = $ci / $randomIndex;

        // Hitung Bobot Global
        $globalWeights = [];
        foreach ($subCriteriaWeights as $criteria => $subs) {
            foreach ($subs as $subName => $subWeight) {
                $globalWeights[$criteria][$subName] = $criteriaWeights[$criteria] * $subWeight;
            }
        }

        // Hitung Nilai Produk
        $productScores = [];
        foreach ($products as $product) {
            $score = 0;
            foreach ($product as $criteria => $subName) {
                if (isset($globalWeights[$criteria][$subName])) {
                    $score += $globalWeights[$criteria][$subName];
                }
            }
            $productScores[] = [
                'name' => $product['name'],
                'score' => $score,
            ];
        }

        // Urutkan berdasarkan skor
        usort($productScores, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        // Return to the view with CI, CR, Lambda Max, and recommendations
        return view('recommendation.result', [
            'productScores' => $productScores,
            'lambdaMax' => $lambdaMax,
            'ci' => $ci,
            'cr' => $cr,
        ]);
    }



    // Fungsi untuk menghitung Lambda Max (λmax)
    private function calculateLambdaMax($subCriteriaWeights)
    {
        // Contoh matriks perbandingan untuk kriteria
        $comparisonMatrix = [
            [1, 2, 3], // Harga
            [0.5, 1, 2], // Garasi
            [0.333, 0.5, 1], // Luas
        ];

        // Hitung lambda max (λmax)
        $n = count($comparisonMatrix);
        $eigenValues = []; // Hasil perkiraan nilai eigen

        // Perhitungan untuk λmax bisa lebih kompleks tergantung algoritma yang digunakan
        // Sebagai contoh, kita menggunakan hasil perhitungan manual atau dari matrix AHP
        $lambdaMax = 5.1; // Contoh nilai λmax yang sudah dihitung (bisa didapat dengan metode AHP)

        return $lambdaMax;
    }

    // Fungsi untuk mendapatkan Random Index (RI) berdasarkan jumlah kriteria
    private function getRandomIndex($n)
    {
        $randomIndices = [
            1 => 0.0,
            2 => 0.0,
            3 => 0.58,
            4 => 0.9,
            5 => 1.12,
            6 => 1.24,
            7 => 1.32,
            8 => 1.41,
            9 => 1.45,
            10 => 1.49,
        ];

        return $randomIndices[$n] ?? 1.5; // Default RI value if n > 10
    }
}
