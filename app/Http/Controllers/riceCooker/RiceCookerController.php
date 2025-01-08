<?php

namespace App\Http\Controllers\riceCooker;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Models\User;
use Illuminate\Http\Request;

class RiceCookerController extends Controller
{
    public function index()
    {
        $alternatif = Alternative::all();
        return view('content.alternatif.alternatif', ['alternatifs' => $alternatif]);
    }
}
