<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
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

Route::get('/', [WebController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

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
Route::get('/wilayah', [WilayahController::class, 'index'])->name('wilayah');
Route::get('/wilayah/add', [WilayahController::class, 'add']);
Route::post('/wilayah/insert', [WilayahController::class, 'insert']);
Route::get('/wilayah/edit/{id_wilayah}', [WilayahController::class, 'edit']);
Route::post('/wilayah/update/{id_wilayah}', [WilayahController::class, 'update']);
Route::get('/wilayah/delete/{id_wilayah}', [WilayahController::class, 'delete']);

//perkebunan
Route::get('/perkebunan', [PerkebunanController::class, 'index'])->name('perkebunan');
Route::get('/perkebunan/add', [PerkebunanController::class, 'add']);
Route::post('/perkebunan/insert', [PerkebunanController::class, 'insert']);
Route::get('/perkebunan/edit/{id_perkebunan}', [PerkebunanController::class, 'edit']);
Route::post('/perkebunan/update/{id_perkebunan}', [PerkebunanController::class, 'update']);
Route::get('/perkebunan/delete/{id_perkebunan}', [PerkebunanController::class, 'delete']);

//hasil
Route::get('/hasil', [HasilController::class, 'index'])->name('hasil');
Route::get('/hasil/add', [HasilController::class, 'add']);
Route::post('/hasil/insert', [HasilController::class, 'insert']);
Route::get('/hasil/edit/{id_hasil}', [HasilController::class, 'edit']);
Route::post('/hasil/update/{id_hasil}', [HasilController::class, 'update']);
Route::get('/hasil/delete/{id_hasil}', [HasilController::class, 'delete']);

//user
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/add', [UserController::class, 'add']);
Route::post('/user/insert', [UserController::class, 'insert']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/delete/{id}', [UserController::class, 'delete']);


//frontend
Route::get('/wilayah/{id}', [WebController::class, 'wilayah']);
Route::get('/perkebunan/{id}', [WebController::class, 'perkebunan']);
Route::get('/detailhasil/{id}', [WebController::class, 'detailhasil']);
