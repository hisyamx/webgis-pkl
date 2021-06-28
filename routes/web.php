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

    //Kecamatan
    Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('admin.kecamatan.index');
    Route::get('/kecamatan/add', [KecamatanController::class, 'add'])->name('admin.kecamatan.add');
    Route::post('/kecamatan', [KecamatanController::class, 'insert']);
    Route::get('/kecamatan/edit/{id_kecamatan}', [KecamatanController::class, 'edit'])->name('admin.kecamatan.edit');
    Route::post('/kecamatan/update/{id_kecamatan}', [KecamatanController::class, 'update'])->name('admin.kecamatan.update');
    Route::get('/kecamatan/delete/{id_kecamatan}', [KecamatanController::class, 'delete'])->name('admin.kecamatan.delete');

    //jenjang
    Route::get('/jenjang', [JenjangController::class, 'index'])->name('admin.jenjang.index');
    Route::get('/jenjang/add', [JenjangController::class, 'add'])->name('admin.jenjang.add');
    Route::post('/jenjang/insert', [JenjangController::class, 'insert'])->name('admin.jenjang.insert');
    Route::get('/jenjang/edit/{id_jenjang}', [JenjangController::class, 'edit'])->name('admin.jenjang.edit');
    Route::post('/jenjang/update/{id_jenjang}', [JenjangController::class, 'update'])->name('admin.jenjang.update');
    Route::get('/jenjang/delete/{id_jenjang}', [JenjangController::class, 'delete'])->name('admin.jenjang.delete');

    //sekolah
    Route::get('/sekolah', [SekolahController::class, 'index'])->name('admin.sekolah.index');
    Route::get('/sekolah/add', [SekolahController::class, 'add'])->name('admin.sekolah.add');
    Route::post('/sekolah/insert', [SekolahController::class, 'insert'])->name('admin.sekolah.insert');
    Route::get('/sekolah/edit/{id_sekolah}', [SekolahController::class, 'edit'])->name('admin.sekolah.edit');
    Route::post('/sekolah/update/{id_sekolah}', [SekolahController::class, 'update'])->name('admin.sekolah.update');
    Route::get('/sekolah/delete/{id_sekolah}', [SekolahController::class, 'delete'])->name('admin.sekolah.delete');

    //wilayah
    Route::get('/wilayah', [WilayahController::class, 'index'])->name('admin.wilayah.index');
    Route::get('/wilayah/add', [WilayahController::class, 'add'])->name('admin.wilayah.add');
    Route::post('/wilayah/insert', [WilayahController::class, 'insert']);
    Route::get('/wilayah/edit/{id_wilayah}', [WilayahController::class, 'edit'])->name('admin.wilayah.edit');
    Route::post('/wilayah/update/{id_wilayah}', [WilayahController::class, 'update'])->name('admin.wilayah.update');
    Route::get('/wilayah/delete/{id_wilayah}', [WilayahController::class, 'delete'])->name('admin.wilayah.delete');

    //perkebunan
    Route::get('/perkebunan', [PerkebunanController::class, 'index'])->name('admin.perkebunan.index');
    Route::get('/perkebunan/add', [PerkebunanController::class, 'add'])->name('admin.perkebunan.add');
    Route::post('/perkebunan/insert', [PerkebunanController::class, 'insert']);
    Route::get('/perkebunan/edit/{id_perkebunan}', [PerkebunanController::class, 'edit'])->name('admin.perkebunan.edit');
    Route::post('/perkebunan/update/{id_perkebunan}', [PerkebunanController::class, 'update'])->name('admin.perkebunan.update');
    Route::get('/perkebunan/delete/{id_perkebunan}', [PerkebunanController::class, 'delete'])->name('admin.perkebunan.delete');

    //hasil
    Route::get('/hasil', [HasilController::class, 'index'])->name('admin.hasil.index');
    Route::get('/hasil/add', [HasilController::class, 'add'])->name('admin.hasil.add');
    Route::post('/hasil/insert', [HasilController::class, 'insert']);
    Route::get('/hasil/edit/{id_hasil}', [HasilController::class, 'edit'])->name('admin.hasil.edit');
    Route::post('/hasil/update/{id_hasil}', [HasilController::class, 'update'])->name('admin.hasil.update');
    Route::get('/hasil/delete/{id_hasil}', [HasilController::class, 'delete'])->name('admin.hasil.delete');

    //user
    Route::get('/profile', [UserController::class, 'index'])->name('admin.profile.index');
    Route::get('/profile/add', [UserController::class, 'add'])->name('admin.profile.add');
    Route::post('/profile/insert', [UserController::class, 'insert']);
    Route::get('/profile/edit/{id}', [UserController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/profile/update/{id}', [UserController::class, 'update'])->name('admin.profile.update');
    Route::get('/profile/delete/{id}', [UserController::class, 'delete'])->name('admin.profile.delete');

    //tentang
    Route::get('/tentang', [TentangController::class, 'index'])->name('admin.tentang.index');
    Route::get('/tentang/add', [TentangController::class, 'add'])->name('admin.tentang.add');
    Route::post('/tentang/insert', [TentangController::class, 'insert']);
    Route::get('/tentang/edit/{id}', [TentangController::class, 'edit'])->name('admin.tentang.edit');
    Route::post('/tentang/update/{id}', [TentangController::class, 'update'])->name('admin.tentang.update');
    Route::get('/tentang/delete/{id}', [TentangController::class, 'delete'])->name('admin.tentang.delete');
});
