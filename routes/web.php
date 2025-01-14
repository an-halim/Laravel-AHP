<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Admin\CriteriaController;
use App\Http\Controllers\Admin\SubCriteriaController;
// use App\Http\Controllers\Admin\ComparisonsController;
// use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RumahController;
use App\Http\Controllers\Admin\HasilController;
use App\Http\Controllers\Admin\AhpController;
use App\Http\Controllers\AuthUser;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RatingScaleController;
use App\Http\Controllers\riceCooker\RiceCookerController;
use App\Http\Controllers\user\UserController;

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
Route::get('/', [CustomerController::class, 'index']);

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
});

Route::middleware('role:Admin')->group(function () {
    Route::get('/data-master/user', [UserController::class, 'index'])->name('data-master-user');
    Route::post('/data-master/user', [UserController::class, 'create'])->name('create-user');
    Route::put('/data-master/user/{id}', [UserController::class, 'update'])->name('update-user');
    Route::delete('/data-master/user/{id}', [UserController::class, 'delete'])->name('delete-user');

    Route::get('/data-master/alternatif', [RiceCookerController::class, 'index'])->name('data-master-alternatif');
    Route::post('/data-master/alternatif', [RiceCookerController::class, 'create'])->name('data-master-alternatif');

    Route::get('/data-master/criteria', [CriteriaController::class, 'index'])->name('data-master-criteria');
    Route::post('/data-master/criteria', [CriteriaController::class, 'create'])->name('data-master-criteria');
    Route::put('/data-master/criteria/{id}', [CriteriaController::class, 'update'])->name('data-master-update-criteria');
    Route::delete('/data-master/criteria/{id}', [CriteriaController::class, 'delete'])->name('data-master-delete-criteria');

    Route::get('/data-master/rating', [RatingScaleController::class, 'index'])->name('data-master-rating');
    Route::post('/data-master/rating', [RatingScaleController::class, 'store'])->name('data-master-rating');
    Route::put('/data-master/rating/{id}', [RatingScaleController::class, 'update'])->name('data-master-update-rating');
    Route::delete('/data-master/rating/{id}', [RatingScaleController::class, 'destroy'])->name('data-master-delete-rating');

    Route::get('/data-master/sub-criteria', [SubCriteriaController::class, 'index'])->name('data-master-sub-criteria');
    Route::post('/data-master/sub-criteria', [SubCriteriaController::class, 'create'])->name('data-master-sub-criteria');
    Route::put('/data-master/sub-criteria/{id}', [SubCriteriaController::class, 'update'])->name('data-master-update-sub-criteria');
    Route::delete('/data-master/sub-criteria/{id}', [SubCriteriaController::class, 'delete'])->name('data-master-delete-sub-criteria');
});


// ADMIN
Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AdminController::class, 'index']);

    // DATA USER
    Route::get('/admin/user', [UserController::class, 'index']);
    Route::get('/admin/user/form', [UserController::class, 'tampilform']);
    Route::post('/admin/user/form/postuser', [UserController::class, 'postuser'])->name('postuser');
    Route::get('/admin/user/formedit/{id}', [UserController::class, 'tampiledituser'])->name('edituser');
    Route::post('/admin/user/formedit/updateuser/{id}', [UserController::class, 'updateuser'])->name('updateuser');
    Route::get('/admin/user/hapususer/{id}', [UserController::class, 'deluser'])->name('hapususer');

    // DATA RUMAH (Alternative::modele)
    Route::get('/admin/rumah', [RumahController::class, 'index']);
    Route::get('/admin/rumah/form', [RumahController::class, 'tampilform']);
    Route::post('/admin/rumah/form/postrumah', [RumahController::class, 'postrumah'])->name('postrumah');
    Route::get('/admin/rumah/formedit/{id}', [RumahController::class, 'tampileditrumah'])->name('editrumah');
    Route::post('/admin/rumah/formedit/updaterumah/{id}', [RumahController::class, 'updaterumah'])->name('updaterumah');
    Route::get('/admin/rumah/hapusrumah/{tipe}', [RumahController::class, 'delrumah'])->name('hapusrumah');

    // DATA KRITERIA
    Route::get('/admin/kriteria', [CriteriaController::class, 'index']);
    Route::get('/admin/kriteria/form', [CriteriaController::class, 'tampilform']);
    Route::post('/admin/kriteria/form/postkriteria', [CriteriaController::class, 'postkriteria'])->name('postkriteria');
    Route::get('/admin/kriteria/formedit/{id}', [CriteriaController::class, 'tampileditkriteria'])->name('editkriteria');
    Route::post('/admin/kriteria/formedit/updatekriteria/{id}', [CriteriaController::class, 'updatekriteria'])->name('updatekriteria');

    // Data Nilai Kriteria (Sub Kriteria)
    Route::get('/admin/sub', [SubCriteriaController::class, 'index']);
    Route::get('/admin/sub/form', [SubCriteriaController::class, 'tampilform']);
    Route::post('/admin/sub/form/postsub', [SubCriteriaController::class, 'postsub'])->name('postsub');
    Route::get('/admin/sub/formedit/{id}', [SubCriteriaController::class, 'tampileditsub'])->name('editsub');
    Route::post('/admin/sub/formedit/updatesub/{id}', [SubCriteriaController::class, 'updatesub'])->name('updatesub');
    Route::get('/admin/sub/hapussub/{id}', [SubCriteriaController::class, 'delsub'])->name('hapussub');

    // Data Alternative
    Route::get('/admin/alternative', [AhpController::class, 'tampilalternative']);
    Route::post('/admin/alternative/postalt', [AhpController::class, 'postalt'])->name('postalt');

    // ~~~~~~~~~~~~~~
    // Route::get('/admin/ahp', [AhpController::class, 'index']);
    // Route::get('/admin/ahp/perhitungan', [AhpController::class, 'indexperhitungan']);
    // Route::get('/admin/ahp/hasil', [AhpController::class, 'indexhasil']);
});

//CUSTOMER
Route::group(['middleware' => ['auth']], function () {
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
    Route::get('/profil/reset', [CustomerController::class, 'tampilmodal']);
    Route::post('/home/{password}', [CustomerController::class, 'ubahpassword'])->name('ubahpassword');
});
