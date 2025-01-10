<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\SubCriteria;
use App\Models\User;
use Illuminate\Http\Request;

class Analytics extends Controller
{
    public function index()
    {
        $auth = auth()->user();
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        $alternative = Alternative::orderBy('created_at', 'desc')->paginate(5);
        $userCount = User::all()->count();
        $criteriaCount = Criteria::all()->count();
        $alternativeCount = Alternative::all()->count();
        $subCriteriaCount = SubCriteria::all()->count();

        return view('content.dashboard.dashboards-analytics', [
            'auth' => $auth,
            'users' => $users,
            'alternative' => $alternative,
            'userCount' => $userCount,
            'criteriaCount' => $criteriaCount,
            'alternativeCount' => $alternativeCount,
            'subCriteriaCount' => $subCriteriaCount
        ]);
    }
}
