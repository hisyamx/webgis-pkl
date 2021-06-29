<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\PerkebunanController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\TentangController;
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

Route::get('/dashboard', [ViewController::class, 'index'])->name('user.dashboard');

//frontend
Route::get('/kecamatan/{id_kecamatan}', [WebController::class, 'kecamatan']);
Route::get('/jenjang/{id_jenjang}', [WebController::class, 'jenjang']);
Route::get('/detailsekolah/{id_sekolah}', [WebController::class, 'detailsekolah']);
Route::get('/tentanggis', [ViewController::class, 'tentanggis'])->name('user.tentang');
Route::get('/wilayah/{id_wilayah}', [ViewController::class, 'wilayah'])->name('user.wilayah');
Route::get('/perkebunan/{id_perkebunan}', [ViewController::class, 'perkebunan'])->name('user.perkebunan');
Route::get('/detailhasil/{id_hasil}', [ViewController::class, 'detailhasil']);

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('admin.home.index');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard.index');

    // ------------------------- Kelola Wilayah -------------------------
    // > Wilayah
    //Get Requests
    Route::get("/wilayah", [WilayahController::class, 'index'])->name('admin.wilayah.index');
    Route::get("/wilayah/create", [WilayahController::class, 'create'])->name('admin.wilayah.create');
    Route::get("/wilayah/edit/{id_wilayah}", [WilayahController::class, 'edit'])->name('admin.wilayah.edit');
    Route::get("/wilayah/show/{id_wilayah}", [WilayahController::class, 'show'])->name('admin.wilayah.show');
    //Post Requests
    Route::post("/wilayah/store", [WilayahController::class, 'store'])->name('admin.wilayah.store');
    Route::post("/wilayah/edit/{id_wilayah}", [WilayahController::class, 'update_record'])->name('admin.wilayah.edit');
    // Delete Request
    Route::delete("/wilayah/delete/{id_wilayah}", [WilayahController::class, 'destroy'])->name('admin.wilayah.delete');

    // ------------------------- Kelola Perkebunan -------------------------
    // > Perkebunan
    //Get Requests
    Route::get("/perkebunan", [PerkebunanController::class, 'index'])->name('admin.perkebunan.index');
    Route::get("/perkebunan/create", [PerkebunanController::class, 'create'])->name('admin.perkebunan.create');
    Route::get("/perkebunan/edit/{id_perkebunan}", [PerkebunanController::class, 'edit'])->name('admin.perkebunan.edit');
    Route::get("/perkebunan/show/{id_perkebunan}", [PerkebunanController::class, 'show'])->name('admin.perkebunan.show');
    //Post Requests
    Route::post("/perkebunan/store", [PerkebunanController::class, 'store'])->name('admin.perkebunan.store');
    Route::post("/perkebunan/edit/{id_perkebunan}", [PerkebunanController::class, 'update_record'])->name('admin.perkebunan.edit');
    // Delete Request
    Route::delete("/perkebunan/delete/{id_perkebunan}", [PerkebunanController::class, 'destroy'])->name('admin.perkebunan.delete');

    // ------------------------- Kelola Hasil -------------------------
    // > Hasil
    //Get Requests
    Route::get("/hasil", [HasilController::class, 'index'])->name('admin.hasil.index');
    Route::get("/hasil/create", [HasilController::class, 'create'])->name('admin.hasil.create');
    Route::get("/hasil/edit/{id_hasil}", [HasilController::class, 'edit'])->name('admin.hasil.edit');
    Route::get("/hasil/show/{id_hasil}", [HasilController::class, 'show'])->name('admin.hasil.show');
    //Post Requests
    Route::post("/hasil/store", [HasilController::class, 'store'])->name('admin.hasil.store');
    Route::post("/hasil/edit/{id_hasil}", [HasilController::class, 'update_record'])->name('admin.hasil.edit');
    // Delete Request
    Route::delete("/hasil/delete/{id_hasil}", [HasilController::class, 'destroy'])->name('admin.hasil.delete');

    // ------------------------- Kelola Admin -------------------------
    // > Admin
    //Get Requests
    Route::get("/profile", [UserController::class, 'index'])->name('admin.profile.index');
    Route::get("/profile/create", [UserController::class, 'create'])->name('admin.profile.create');
    Route::get("/profile/edit/{id}", [UserController::class, 'edit'])->name('admin.profile.edit');
    Route::get("/profile/show/{id}", [UserController::class, 'show'])->name('admin.profile.show');
    //Post Requests
    Route::post("/profile/store", [UserController::class, 'store'])->name('admin.profile.store');
    Route::post("/profile/edit/{id}", [UserController::class, 'update_record'])->name('admin.profile.edit');
    // Delete Request
    Route::delete("/profile/delete/{id}", [UserController::class, 'destroy'])->name('admin.profile.delete');

    // ------------------------- Kelola Tentang -------------------------
    // > Tentang
    //Get Requests
    Route::get("/tentang", [TentangController::class, 'index'])->name('admin.tentang.index');
    Route::get("/tentang/create", [TentangController::class, 'create'])->name('admin.tentang.create');
    Route::get("/tentang/edit/{id}", [TentangController::class, 'edit'])->name('admin.tentang.edit');
    Route::get("/tentang/show/{id}", [TentangController::class, 'show'])->name('admin.tentang.show');
    //Post Requests
    Route::post("/tentang/store", [TentangController::class, 'store'])->name('admin.tentang.store');
    Route::post("/tentang/edit/{id}", [TentangController::class, 'update_record'])->name('admin.tentang.edit');
    // Delete Request
    Route::delete("/tentang/delete/{id}", [TentangController::class, 'destroy'])->name('admin.tentang.delete');
});
