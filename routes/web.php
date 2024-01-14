<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\FasilitatorController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\NilaiPesertaController;
use App\Http\Controllers\IntegrasiDataController;

Route::resource('/peserta',pesertaController::class);

/*membuat root*/
/*alamat memangil, menuliskan nama kelas, menuliskan nama view blade*/


//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);

});

// Untuk superadmin, fasilitator, peserta
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

// Untuk fasilitator
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/fasilitator', [FasilitatorController::class, 'index'])->name('index');
    Route::get('/tambahfasilitator',[FasilitatorController::class, 'TambahFasilitator']);//menampilkan halaman tambah/create data fasilitator
    Route::post('/insertdata',[FasilitatorController::class, 'insertdata']);//menyimpan data inputan dari tambah fasilitator dengan action tombol
    //Route::get('/tampilkandata/{id}',[FasilitatorController::class, 'tampilkandata']);;//menampilkan data yang di pilih pada halaman tampilkan data
    Route::get('/tampilkandata/{id}',[FasilitatorController::class, 'tampilkandata'])->name('edit');
    Route::post('/updatedata/{id}',[FasilitatorController::class, 'updatedata']);//mengupdate data inputan dari halaman tampilkan data dengan action tombol
    Route::get('/deletedata/{id}',[FasilitatorController::class, 'deletedata']);//mengupdate data inputan dari halaman tampilkan data dengan action tombol

});

// Untuk peserta
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/peserta', [PesertaController::class, 'index']);
});

// Untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:3']], function() {
    Route::get('/superadmin', [SuperadminController::class, 'index']);
});

Route::get('/nilai_peserta', [NilaiPesertaController::class, 'index'])->name('nilai_peserta.index');

Route::get('/nilai_peserta/create', [NilaiPesertaController::class, 'create'])->name('nilai_peserta.create');

Route::post('/nilai_peserta/store', [NilaiPesertaController::class, 'store'])->name('nilai_peserta.store');

Route::get('/nilai_peserta/{id}/edit', [NilaiPesertaController::class, 'edit'])->name('nilai_peserta.edit');

Route::put('/nilai_peserta/{id}', [NilaiPesertaController::class, 'update'])->name('nilai_peserta.update');

Route::delete('/nilai_peserta/{id}', [NilaiPesertaController::class, 'destroy'])->name('nilai_peserta.destroy');




Route::get('/data_integrasi', [IntegrasiDataController::class, 'getDataIntegrasi']);
