<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function tampilform()
    {
        return view('admin/package/kriteria/create');
    }

    public function index()
    {
        $data_kriteria = Criteria::all();
        return view('content.criteria.criteria', ['criterias' => $data_kriteria]);
    }

    public function tampileditkriteria($id)
    {
        $data_kriteria = DB::table('criterias')->where('id', $id)->get();
        return view('admin/package/kriteria/update', ['data_kriteria' => $data_kriteria]);
    }

    public function postkriteria(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required'
        ]);

        Criteria::create([
            'code' => $request->code,
            'name' => $request->name
        ]);
        return redirect('/admin/kriteria');
    }

    public function updatekriteria(Request $request)
    {
        // update data
        DB::table('criterias')->where('id', $request->id)->update([
            'name' => $request->name
        ]);
        return redirect('/admin/kriteria');
    }


    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
        ]);

        try {
            Criteria::create([
                'name' => $request->name,
                'code' => $request->code
            ]);

            // Flash success message
            return redirect()->back()->with('success', 'Criteria created successfully.');
        } catch (\Exception $e) {
            // Log the error and flash failure message
            \Log::error("Criteria creation failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create criteria. Please try again.');
        }
    }

    public function delete($id)
    {
        // menghapus data criteria berdasarkan id yang dipilih
        try {
            Criteria::destroy($id);
            return redirect()->back()->with('success', 'Criteria deleted successfully');
        } catch (\Exception $e) {
            // Log the error and flash failure message
            \Log::error("Criteria deletion failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete criteria. Please try again.');
        }
    }
}
