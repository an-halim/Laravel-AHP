<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CriteriaController;
use App\Http\Controllers\Dashboard\SubCriteriaController;
// use App\Http\Controllers\Dashboard\ComparisonsController;
// use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\HasilController;
use App\Http\Controllers\Dashboard\AhpController;
use App\Http\Controllers\dashboard\Analytics;
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
    Route::get('/ahp/alternatif', [AhpController::class, 'tampilalternative'])->name('ahp-alternatif');
    Route::get('/ahp/report', [HasilController::class, 'report'])->name('ahp-reports');
    Route::get('/ahp/report/{id}', [HasilController::class, 'showReport'])->name('ahp-report');
    Route::delete('/ahp/report/{id}', [HasilController::class, 'delete'])->name('ahp-report-delete');

    Route::get('/detail/{tipe}', [HasilController::class, 'tampildetail']);

    // Perhitungan AHP Admin
    Route::get('/ahp/bobot', [AhpController::class, 'indexbobot'])->name('ahp-bobot');
    Route::get('/ahp/bobot-sub', [AhpController::class, 'indexbobotsub'])->name('ahp-bobot-sub');
    // Route::post('/ahp/bobot-sub', [AhpController::class, 'postSubCriteria'])->name('postSubCriteria');
    Route::post('/ahp/bobot-sub', [AhpController::class, 'postSubCriterias'])->name('postSubCriterias');
    Route::post('/ahp/bobot/postbobot', [AhpController::class, 'postbobot'])->name('postbobot');
    // Route::post('/ahp/bobot/postmatriks', [AhpController::class, 'postmatriks'])->name('postmatriks');
    Route::post('/ahp/bobot/postmatriks', [AhpController::class, 'postmatriksnew'])->name('postmatriks');
    Route::post('/ahp/bobot/postmatriks2', [AhpController::class, 'postmatriks2new'])->name('postmatriks2');
    // Route::post('/ahp/bobot/postmatriks2', [AhpController::class, 'postmatriks2'])->name('postmatriks2');
    Route::post('/ahp/bobot/cekkonsistensi', [AhpController::class, 'cekkonsistensi'])->name('cekkonsistensi');
    Route::post('/ahp/bobot/posthasilrekomendasi', [AhpController::class, 'posthasilrekomendasi'])->name('posthasilrekomendasi');
    Route::get('/ahp/bobot/kesimpulan/{tipe}', [HasilController::class, 'tampilkesimpulan']);

    // Cetak PDF
    Route::get('/ahp/bobot/kesimpulan/cetak/{tipe}', [HasilController::class, 'cetakpdf']);


    // Modal Reset Password
    Route::get('/profil/reset', [Home::class, 'tampilmodal']);
    Route::post('/home/{password}', [Home::class, 'ubahpassword'])->name('ubahpassword');
});

Route::middleware('role:Admin')->group(function () {
    Route::get('/data-master/user', [UserController::class, 'index'])->name('data-master-user');
    Route::post('/data-master/user', [UserController::class, 'create'])->name('create-user');
    Route::put('/data-master/user/{id}', [UserController::class, 'update'])->name('update-user');
    Route::delete('/data-master/user/{id}', [UserController::class, 'delete'])->name('delete-user');

    Route::get('/data-master/alternatif', [AlternativeController::class, 'index'])->name('data-master-alternatif');
    Route::post('/data-master/alternatif', [AlternativeController::class, 'create'])->name('data-master-alternatif');

    Route::get('/data-master/criteria', [CriteriaController::class, 'index'])->name('data-master-criteria');
    Route::post('/data-master/criteria', [CriteriaController::class, 'create'])->name('data-master-criteria');
    Route::put('/data-master/criteria/{id}', [CriteriaController::class, 'update'])->name('data-master-update-criteria');
    Route::delete('/data-master/criteria/{id}', [CriteriaController::class, 'delete'])->name('data-master-delete-criteria');

    Route::get('/data-master/sub-criteria', [SubCriteriaController::class, 'index'])->name('data-master-sub-criteria');
    Route::post('/data-master/sub-criteria', [SubCriteriaController::class, 'create'])->name('data-master-sub-criteria');
    Route::put('/data-master/sub-criteria/{id}', [SubCriteriaController::class, 'update'])->name('data-master-update-sub-criteria');
    Route::delete('/data-master/sub-criteria/{id}', [SubCriteriaController::class, 'delete'])->name('data-master-delete-sub-criteria');
});
