<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CriteriaController;
use App\Http\Controllers\Dashboard\SubCriteriaController;
// use App\Http\Controllers\Dashboard\ComparisonsController;
// use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\HasilController;
use App\Http\Controllers\Dashboard\AhpController;
use App\Http\Controllers\Dashboard\Analytics;
use App\Http\Controllers\Dashboard\AlternativeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//HOME
Route::get('/', [HomeController::class, 'index']);

//LOGIN
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'doLogin'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// REGISTER
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'doRegister'])->name('register');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Analytics::class, 'index'])->name('dashboard-analytics');
    Route::get('/ahp/alternatif', [AhpController::class, 'alternatives'])->name('ahp.alternatives');
    Route::get('/ahp/bobot', [AhpController::class, 'ahpCompareCriteria'])->name('ahp.compare-criteria');
    Route::post('/ahp/bobot', [AhpController::class, 'calculateAHP'])->name('ahp.calculate');
    Route::post('/ahp/recomendation', [AhpController::class, 'getRecommendation'])->name('ahp.recommendation');
    Route::get('/ahp/report', [HasilController::class, 'reports'])->name('ahp.reports');
    Route::get('/ahp/report/{id}', [HasilController::class, 'showReport'])->name('ahp.report');
    Route::delete('/ahp/report/{id}', [HasilController::class, 'delete'])->name('ahp.delete');

    // Modal Reset Password
    Route::get('/profil/reset', [Home::class, 'tampilmodal']);
    Route::post('/home/{password}', [Home::class, 'ubahpassword'])->name('ubahpassword');
});

Route::middleware('role:Admin')->group(function () {
    Route::get('/data-master/user', [UserController::class, 'index'])->name('data-master.users.index');
    Route::post('/data-master/user', [UserController::class, 'create'])->name('data-master.users.create');
    Route::put('/data-master/user/{id}', [UserController::class, 'update'])->name('data-master.users.update');
    Route::delete('/data-master/user/{id}', [UserController::class, 'delete'])->name('data-master.users.delete');

    Route::get('/data-master/alternatif', [AlternativeController::class, 'index'])->name('data-master.alternatives.index');
    Route::post('/data-master/alternatif', [AlternativeController::class, 'create'])->name('data-master.alternatives.create');
    Route::put('/data-master/alternatif/{id}', [AlternativeController::class, 'update'])->name('data-master.alternatives.update');
    Route::delete('/data-master/alternatif/{id}', [AlternativeController::class, 'delete'])->name('data-master.alternatives.delete');

    Route::get('/data-master/criteria', [CriteriaController::class, 'index'])->name('data-master.criterias.index');
    Route::post('/data-master/criteria', [CriteriaController::class, 'create'])->name('data-master.criterias.create');
    Route::put('/data-master/criteria/{id}', [CriteriaController::class, 'update'])->name('data-master.criterias.update');
    Route::delete('/data-master/criteria/{id}', [CriteriaController::class, 'delete'])->name('data-master.criterias.delete');

    Route::get('/data-master/sub-criteria', [SubCriteriaController::class, 'index'])->name('data-master.subcriterias.index');
    Route::post('/data-master/sub-criteria', [SubCriteriaController::class, 'create'])->name('data-master.subcriterias.create');
    Route::put('/data-master/sub-criteria/{id}', [SubCriteriaController::class, 'update'])->name('data-master.subcriterias.update');
    Route::delete('/data-master/sub-criteria/{id}', [SubCriteriaController::class, 'delete'])->name('data-master-subcriterias.delete');
});
