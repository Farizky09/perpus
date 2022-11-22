<?php

use App\Http\Controllers\PinjamController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

//Route anggota
Route::get('/anggota', [PinjamController::class,'indexAnggota']);
Route::get('/anggota/create', [PinjamController::class,'tambahAnggota']);
Route::post('/anggota/store', [PinjamController::class,'simpanAnggota']);
Route::get('/anggota/edit/{id}', [PinjamController::class,'editAnggota']);
Route::post('/anggota/update/{id}', [PinjamController::class,'updateAnggota']);
Route::get('/anggota/delete/{id}', [PinjamController::class,'hapusAnggota']);

//Route Buku
Route::get('/buku', [PinjamController::class,'indexBuku']);
Route::get('/buku/create', [PinjamController::class,'tambahBuku']);
Route::post('/buku/store', [PinjamController::class,'simpanBuku']);
Route::get('/buku/edit/{id}', [PinjamController::class,'editBuku']);
Route::post('/buku/update/{id}', [PinjamController::class,'updateBuku']);
Route::get('/buku/delete/{id}', [PinjamController::class,'hapusBuku']);

//Route kategori
Route::get('/kategori', [PinjamController::class,'indexKategori']);
Route::get('/kategori/create', [PinjamController::class,'tambahKategori']);
Route::post('/kategori/store', [PinjamController::class,'simpanKategori']);
Route::get('/kategori/edit/{id}', [PinjamController::class,'editKategori']);
Route::post('/kategori/update/{id}', [PinjamController::class,'updateKategori']);
Route::get('/kategori/delete/{id}', [PinjamController::class,'hapusKategori']);

//Route Pinjam
Route::get('/pinjam', [PinjamController::class,'indexPinjam']);
Route::get('/pinjam/create', [PinjamController::class,'tambahPinjam']);
Route::post('/pinjam/store', [PinjamController::class,'simpanPinjam']);
Route::get('/pinjam/edit/{id}', [PinjamController::class,'editPinjam']);
Route::post('/pinjam/update/{id}', [PinjamController::class,'updatePinjam']);
Route::get('/pinjam/delete/{id}', [PinjamController::class,'hapusPinjam']);
Route::get('/pinjam/bukti/', [PinjamController::class,'buktiPinjam']);

Route::get('/pinjam/cari', [PinjamController::class,'cari']);
Route::get('/pinjam/balik', [PinjamController::class,'prosesKembali']);

Route::get('/batas', [PinjamController::class,'tambahBatasan']);
Route::post('/batas/simpan', [PinjamController::class,'simpanBatasan']);
