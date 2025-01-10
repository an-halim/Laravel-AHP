<?php

namespace App\Http\Controllers\riceCooker;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Models\User;
use Illuminate\Http\Request;

class RiceCookerController extends Controller
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
        $allowedSorts = ['nama', 'model', 'harga', 'dayatahan', 'watt', 'kapasitas', 'garansi']; // Add other sortable columns
        if (in_array($sortBy, $allowedSorts) && in_array($sortDirection, ['asc', 'desc'])) {
            $query->orderBy($sortBy, $sortDirection);
        }

        // Execute query and paginate results
        $data = $query->paginate(10)->appends($request->all());
        return view('content.alternatif.alternatif', ['alternatifs' => $data]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'model' => 'required',
            'garansi' => 'required',
            'harga' => 'required',
            'watt' => 'required',
            'kapasitas' => 'required',
            'dayatahan' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            Alternative::create([
                'model' => $request->model,
                'name' => $request->name,
                'garansi' => $request->garansi,
                'watt' => $request->watt,
                'harga' => $request->harga,
                'kapasitas' => $request->kapasitas,
                'dayatahan' => $request->dayatahan,
                'keterangan' => $request->keterangan,
                'gambar' => $nama_file
            ]);
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload, $nama_file);

            if ($request->watt <= 150) {
                $wattc = 1;
            } else if ($request->watt >= 200 && $request->watt <= 249) {
                $wattc = 2;
            } else if ($request->watt >= 250) {
                $wattc = 3;
            } else {
                $wattc = 1;
            }

            if ($request->harga <= 1000000000) {
                $hargac = 1;
            } else if ($request->harga >= 1500000000 && $request->harga <= 1999999999) {
                $hargac = 2;
            } else if ($request->harga >= 2000000000) {
                $hargac = 3;
            } else {
                $hargac = 1;
            }

            if ($request->kapasitas == "Tidak ada") {
                $kapasitasc = 1;
            } else if ($request->kapasitas == "Ada") {
                $kapasitasc = 2;
            } else {
                $kapasitasc = 1;
            }


            Comparisons::create([
                'model' => $request->model,
                'name' => $request->cbname,
                'garansi' => $request->garansi,
                'watt' => $wattc,
                'harga' => $hargac,
                'kapasitas' => $kapasitasc
            ]);

            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        }
    }
}
