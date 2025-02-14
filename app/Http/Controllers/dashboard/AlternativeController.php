<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Models\Comparisons;
use App\Models\Criteria;
use App\Models\User;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    public function index(Request $request)
    {
        $query = Alternative::query();

        // Handle search
        if ($request->has('search')) {
            $searchTerm = strtolower($request->input('search'));
            $query->whereRaw('LOWER(nama) LIKE ?', ["%{$searchTerm}%"])
                ->orWhereRaw('LOWER(model) LIKE ?', ["%{$searchTerm}%"]); // Add other fields as needed
        }



        // Handle sorting
        $sortBy = $request->input('sort_by', 'nama'); // Default column
        $sortDirection = $request->input('sort_direction', 'asc'); // Default direction

        // Validate sorting inputs
        $allowedSorts = ['nama', 'model', 'harga', 'garansi', 'watt', 'kapasitas', 'garansi']; // Add other sortable columns
        if (in_array($sortBy, $allowedSorts) && in_array($sortDirection, ['asc', 'desc'])) {
            $query->orderBy($sortBy, $sortDirection);
        }

        // Execute query and paginate results
        $data = $query->paginate(10)->appends($request->all());
        return view('dashboard.alternatif.alternatif', ['alternatifs' => $data]);
    }

    /**
     * Validate the incoming request.
     */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'kapasitas' => 'required',
            'garansi' => 'required',
            'watt' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required',
        ]);
    }


    /**
     * Handle file upload and return the file name.
     */
    private function uploadFile($file)
    {
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);
        return $nama_file;
    }


    /**
     * Create an alternative entry in the database.
     */
    private function createAlternative(Request $request, $nama_file)
    {
        return Alternative::create([
            'model' => $request->model,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'kapasitas' => $request->kapasitas,
            'garansi' => $request->garansi,
            'watt' => $request->watt,
            'keterangan' => $request->keterangan,
            'gambar' => $nama_file,
        ]);
    }

    /**
     * Update an alternative entry in the database.
     */
    private function updateAlternative(Request $request, $nama_file)
    {
        return Alternative::where('id', $request->id)->update([
            'model' => $request->model,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'kapasitas' => $request->kapasitas,
            'garansi' => $request->garansi,
            'keterangan' => $request->keterangan,
            'gambar' => $nama_file,
        ]);
    }


    /**
     * Process criteria and return an array of values to insert into the Comparisons table.
     */
    private function processCriteria(array $requestData, $alternativeId)
    {
        $criteriaValues = [];

        foreach ($requestData as $key => $value) {
            $criteria = Criteria::where('name', $key)->first();

            if ($criteria) {
                $subCriteriaId = $this->findMatchingSubCriteria($criteria->id, $value);

                if ($subCriteriaId) {
                    $criteriaValues[] = [
                        'alternative_id' => $alternativeId,
                        'sub_criteria_id' => $subCriteriaId,
                    ];
                }
            }
        }

        return $criteriaValues;
    }

    /**
     * Find the matching SubCriteria ID based on criteria and value.
     */
    private function findMatchingSubCriteria($criteriaId, $value)
    {
        return SubCriteria::where('criteria_id', $criteriaId)
            ->where(function ($query) use ($value) {
                $query->where(function ($subQuery) use ($value) {
                    $subQuery->where('operator', '<=')
                        ->where('value', '<=', $value);
                })->orWhere(function ($subQuery) use ($value) {
                    $subQuery->where('operator', '>=')
                        ->where('value', '>=', $value);
                });
            })
            ->value('id') ?? null;
    }


    public function create(Request $request)
    {
        $this->validateRequest($request);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = $this->uploadFile($file);

            $alternative = $this->createAlternative($request, $nama_file);

            $criteriaValues = $this->processCriteria($request->all(), $alternative->id);

            Comparisons::insert($criteriaValues);

            return redirect()->route('data-master.alternatives.index');
        }
    }

    public function update(Request $request)
    {
        // update data
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = $this->uploadFile($file);

            // Update the alternatives table
            DB::table('alternatives')->where('id', $request->id)->update([
                'lantai' => $request->cblantai,
                'kamar' => $request->cbkamar,
                'luas' => $request->luas,
                'harga' => $request->harga,
                'garasi' => $request->cbgarasi,
                'keterangan' => $request->keterangan,
                'gambar' => $nama_file,
            ]);

            $alternative = $this->updateAlternative($request, $nama_file);
            $criteriaValues = $this->processCriteria($alternative, $alternative->id);

            // Delete existing comparisons
            Comparisons::where('alternative_id', $request->id)->delete();
            Comparisons::insert($criteriaValues);

            return redirect()->route('data-master.alternatives.index');
        }
    }

    public function delete($id)
    {
        // menghapus data criteria berdasarkan id yang dipilih
        try {
            Alternative::destroy($id);
            return redirect()->back()->with('success', 'Alternative deleted successfully');
        } catch (\Exception $e) {
            // Log the error and flash failure message
            \Log::error("Alternative deletion failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete alternative. Please try again.');
        }
    }
}
