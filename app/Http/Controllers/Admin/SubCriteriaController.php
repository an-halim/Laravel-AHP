<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCriteria;
use App\Models\Criteria;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubCriteriaController extends Controller
{
    public function index()
    {
        $data_sub = SubCriteria::paginate(5);
        $criterias = Criteria::all();
        return view('content.sub-criteria.sub-criteria', ['subCriterias' => $data_sub, 'criterias' => $criterias]);
    }

    public function tampilform()
    {
        $data_crt = Criteria::select('name')->get();
        return view('admin/package/subkriteria/create', ['data_crt' => $data_crt]);
    }

    public function tampileditsub($id)
    {
        $data_sub = DB::table('sub_criterias')->where('id', $id)->get();
        $data_crt = Criteria::select('name')->get();

        return view('admin/package/subkriteria/update', [
            'data_crt' => $data_crt,
            'data_sub' => $data_sub
        ]);
    }

    public function postsub(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'cbname' => 'required',
            'nilaik' => 'required',
            'cbnilaib' => 'required'
        ]);

        SubCriteria::create([
            'code' => $request->code,
            'name' => $request->cbname,
            'nilaik' => $request->nilaik,
            'nilaib' => $request->cbnilaib
        ]);
        return redirect('/admin/sub');
    }

    public function updatesub(Request $request)
    {
        // update data
        DB::table('sub_criterias')->where('code', $request->code)->update([
            'name' => $request->cbname,
            'nilaik' => $request->nilaik,
            'nilaib' => $request->cbnilaib
        ]);
        return redirect('/admin/sub');
        // dd($request->all());
    }

    public function delsub($id)
    {
        // menghapus data sub berdasarkan id yang dipilih
        DB::table('sub_criterias')->where('id', $id)->delete();
        return redirect('/admin/sub');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'criteria_id' => 'required',
            'name' => 'required',
            'nilaik' => 'required',
            'cbnilaib' => 'required'
        ]);


        try {

            SubCriteria::create([
                'code' => $request->code,
                'criteria_id' => $request->criteria_id,
                'name' => $request->name,
                'nilaik' => $request->nilaik,
                'nilaib' => $request->cbnilaib
            ]);

            // Flash success message
            return redirect()->back()->with('success', 'Sub criteria created successfully.');
        } catch (\Exception $e) {
            // Log the error and flash failure message
            \Log::error("Sub criteria creation failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create sub criteria. Please try again.');
        }
    }

    public function update(Request $request)
    {
        // update data
        DB::table('sub_criterias')->where('code', $request->code)->update([
            'name' => $request->cbname,
            'nilaik' => $request->nilaik,
            'nilaib' => $request->cbnilaib
        ]);
        return redirect('/admin/sub');
        // dd($request->all());
    }

    public function delete($id)
    {
        // menghapus data criteria berdasarkan id yang dipilih
        try {
            SubCriteria::destroy($id);
            return redirect()->back()->with('success', 'Sub criteria deleted successfully');
        } catch (\Exception $e) {
            // Log the error and flash failure message
            \Log::error("Sub criteria deletion failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete sub criteria. Please try again.');
        }
    }
}
