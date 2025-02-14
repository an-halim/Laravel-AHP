<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Models\Comparisons;
use App\Models\Hasil;
use App\Models\SubCriteria;
use App\Models\User;
use App\Models\UserResult;
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

    public function reports()
    {
        $user = auth()->user();

        if (strtolower($user->role) == 'admin') {
            $reports = UserResult::all();
            return view('dashboard.report.report', compact('reports'));
        } else {
            $reports = UserResult::where('user_id', $user->id);
            return view('dashboard.report.report', compact('reports'));
        }
    }

    public function showReport($id)
    {
        // mengambil data dari table daftar rumah
        $result = Hasil::where('user_result_id', $id);

        $results = $result
            ->orderBy('ahp', 'desc')
            ->get();

        // mengirim data rumah ke view daftar rumah
        return view('dashboard.ahp-recomendation.ahp-recomendation', compact('results'));
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
