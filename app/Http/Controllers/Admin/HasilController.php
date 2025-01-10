<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Models\Comparisons;
use App\Models\Hasil;
use App\Models\SubCriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilController extends Controller
{
    public function tampildetail($tipe)
    {
        // mengambil data dari table daftar rumah
        $data_rumah = Alternative::where('tipe', $tipe)->get();

        // mengirim data rumah ke view daftar rumah
        return view('customer/package/rumah/detail', [
            'data_rumah' => $data_rumah
        ]);
    }

    public function tampilkesimpulan($model)
    {
        // mengambil data dari table daftar rumah
        $data_rumah = Hasil::where('model', $model)->get();

        // mengirim data rumah ke view daftar rumah
        return view('customer/package/rumah/kesimpulan', [
            'data_rumah' => $data_rumah
        ]);
    }

    public function report()
    {
        $user = auth()->user();
        // mengambil data dari table user result
        $reports = $user->getResultLogged;

        // mengirim report ke view report
        return view('content.report.report', compact('reports'));
    }

    public function showReport($id)
    {
        // mengambil data dari table daftar rumah
        $data_rumah = Hasil::where('user_result_id', $id);

        $datahasil = $data_rumah
            ->orderBy('ahp', 'desc')
            ->get();

        $datamax = $data_rumah
            ->orderBy('ahp', 'desc')
            ->limit(1)
            ->first(); // Using `first()` instead of `get()` to fetch a single result

        // mengirim data rumah ke view daftar rumah
        return view('content.result.result', [
            'results' => $datahasil
        ]);
    }

    public function cetakpdf($tipe)
    {
        // set_time_limit(300);
        $data_rumah = Hasil::where('tipe', $tipe)->get();
        $pdf = \PDF::loadView('customer.package.rumah.cetak', compact('data_rumah'));
        $pdf->download('cetak.pdf');
        return view('customer/package/rumah/cetak', [
            'data_rumah' => $data_rumah
        ]);
    }

    public function delete($id)
    {
        // menghapus data hasil berdasarkan id yang dipilih
        try {
            Hasil::destroy($id);
            return redirect()->back()->with('success', 'Report deleted successfully');
        } catch (\Exception $e) {
            // Log the error and flash failure message
            \Log::error("Report deletion failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete report. Please try again.');
        }
    }
}
