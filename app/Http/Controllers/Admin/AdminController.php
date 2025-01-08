<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Criteria;
use App\Models\SubCriteria;
use App\Models\Alternative;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        $alternative = Alternative::orderBy('created_at', 'desc')->paginate(5);
        $userCount = User::all()->count();
        $criteriaCount = Criteria::all()->count();
        $alternativeCount = Alternative::all()->count();
        $subCriteriaCount = SubCriteria::all()->count();

        return view('admin/package/index', [
            'users' => $users,
            'alternative' => $alternative,
            'userCount' => $userCount,
            'criteriaCount' => $criteriaCount,
            'alternativeCount' => $alternativeCount,
            'subCriteriaCount' => $subCriteriaCount
        ]);
    }

    public function indexrumah()
    {
        return view('admin/package/rumah/index');
    }
}
