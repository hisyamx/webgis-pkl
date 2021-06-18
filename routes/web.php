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

// Route::get('/', [WebController::class, 'index']);
Route::get('/', [ViewController::class, 'index'])->name('user.dashboard');

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');

//Kecamatan
Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');
Route::get('/kecamatan/add', [KecamatanController::class, 'add']);
Route::post('/kecamatan/insert', [KecamatanController::class, 'insert']);
Route::get('/kecamatan/edit/{id_kecamatan}', [KecamatanController::class, 'edit']);
Route::post('/kecamatan/update/{id_kecamatan}', [KecamatanController::class, 'update']);
Route::get('/kecamatan/delete/{id_kecamatan}', [KecamatanController::class, 'delete']);

//jenjang
Route::get('/jenjang', [JenjangController::class, 'index'])->name('jenjang');
Route::get('/jenjang/add', [JenjangController::class, 'add']);
Route::post('/jenjang/insert', [JenjangController::class, 'insert']);
Route::get('/jenjang/edit/{id_jenjang}', [JenjangController::class, 'edit']);
Route::post('/jenjang/update/{id_jenjang}', [JenjangController::class, 'update']);
Route::get('/jenjang/delete/{id_jenjang}', [JenjangController::class, 'delete']);

//sekolah
Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah');
Route::get('/sekolah/add', [SekolahController::class, 'add']);
Route::post('/sekolah/insert', [SekolahController::class, 'insert']);
Route::get('/sekolah/edit/{id_sekolah}', [SekolahController::class, 'edit']);
Route::post('/sekolah/update/{id_sekolah}', [SekolahController::class, 'update']);
Route::get('/sekolah/delete/{id_sekolah}', [SekolahController::class, 'delete']);


//frontend
Route::get('/kecamatan/{id_kecamatan}', [WebController::class, 'kecamatan']);
Route::get('/jenjang/{id_jenjang}', [WebController::class, 'jenjang']);
Route::get('/detailsekolah/{id_sekolah}', [WebController::class, 'detailsekolah']);
Route::get('/home', [HomeController::class, 'index'])->name('home');


//wilayah
Route::get('/wilayah', [WilayahController::class, 'index'])->name('wilayah.index');
Route::get('/wilayah/add', [WilayahController::class, 'add'])->name('wilayah.add');
Route::post('/wilayah/insert', [WilayahController::class, 'insert']);
Route::get('/wilayah/edit/{id_wilayah}', [WilayahController::class, 'edit'])->name('wilayah.edit');
Route::post('/wilayah/update/{id_wilayah}', [WilayahController::class, 'update'])->name('wilayah.update');
Route::get('/wilayah/delete/{id_wilayah}', [WilayahController::class, 'delete'])->name('wilayah.delete');

//perkebunan
Route::get('/perkebunan', [PerkebunanController::class, 'index'])->name('perkebunan.index');
Route::get('/perkebunan/add', [PerkebunanController::class, 'add'])->name('perkebunan.add');
Route::post('/perkebunan/insert', [PerkebunanController::class, 'insert']);
Route::get('/perkebunan/edit/{id_perkebunan}', [PerkebunanController::class, 'edit'])->name('perkebunan.edit');
Route::post('/perkebunan/update/{id_perkebunan}', [PerkebunanController::class, 'update'])->name('perkebunan.update');
Route::get('/perkebunan/delete/{id_perkebunan}', [PerkebunanController::class, 'delete'])->name('perkebunan.delete');

//hasil
Route::get('/hasil', [HasilController::class, 'index'])->name('hasil.index');
Route::get('/hasil/add', [HasilController::class, 'add'])->name('hasil.add');
Route::post('/hasil/insert', [HasilController::class, 'insert']);
Route::get('/hasil/edit/{id_hasil}', [HasilController::class, 'edit'])->name('hasil.edit');
Route::post('/hasil/update/{id_hasil}', [HasilController::class, 'update'])->name('hasil.update');
Route::get('/hasil/delete/{id_hasil}', [HasilController::class, 'delete'])->name('hasil.delete');

//user
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/add', [UserController::class, 'add'])->name('user.add');
Route::post('/user/insert', [UserController::class, 'insert']);
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');


//frontend
Route::get('/wilayah/{id_wilayah}', [ViewController::class, 'wilayah']);
Route::get('/perkebunan/{id_perkebunan}', [ViewController::class, 'perkebunan']);
Route::get('/detailhasil/{id_hasil}', [ViewController::class, 'detailhasil']);
