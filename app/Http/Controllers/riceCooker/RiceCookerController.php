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
}
