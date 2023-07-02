<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SendEmail;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return redirect('/');
});

// REGISTER
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'registerProses']);
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/cek_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('send-email', [SendEmail::class, 'index']);

Route::group(['middleware' => ['auth', 'checkLevel:admin']], function () {

    //Data master user
    Route::get('/user', [UserController::class, 'index']);
    Route::POST('/user/store', [UserController::class, 'store']);
    Route::POST('/user/{id}/update', [UserController::class, 'update']);
    Route::get('/user/{id}/destroy', [UserController::class, 'destroy']);

    //Data master kategori
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::POST('/kategori/store', [KategoriController::class, 'store']);
    Route::POST('/kategori/{id}/update', [KategoriController::class, 'update']);
    Route::get('/kategori/{id}/destroy', [KategoriController::class, 'destroy']);

    //Data master lokasi
    Route::get('/lokasi', [LokasiController::class, 'index']);
    Route::POST('/lokasi/store', [LokasiController::class, 'store']);
    Route::POST('/lokasi/{id}/update', [LokasiController::class, 'update']);
    Route::get('/lokasi/{id}/destroy', [LokasiController::class, 'destroy']);

    //Data master divisi
    Route::get('/divisi', [DivisiController::class, 'index']);
    Route::POST('/divisi/store', [DivisiController::class, 'store']);
    Route::POST('/divisi/{id}/update', [DivisiController::class, 'update']);
    Route::get('/divisi/{id}/destroy', [DivisiController::class, 'destroy']);

    //Data master barang
    Route::get('/barang', [BarangController::class, 'index']);
    Route::POST('/barang/store', [BarangController::class, 'store']);
    Route::POST('/barang/{id}/update', [BarangController::class, 'update']);
    Route::get('/barang/{id}/destroy', [BarangController::class, 'destroy']);
    Route::POST('/barang/{id}/detail', [BarangController::class, 'detail']);

    //Laporan
    Route::get('/laporan', [LaporanController::class, 'index']);
    Route::get('/laporan/pdf', [LaporanController::class, 'pdf']);

    //Auditing

    Route::get('/audit', [AuditController::class, 'index']);
    Route::get('/audit/detail/{id}', [AuditController::class, 'detail']);
});

Route::group(['middleware' => ['auth', 'checkLevel:admin,user']], function () {

    Route::get('/home', [HomeController::class, 'home'])->middleware(['auth']);
    Route::post('/mutasi/store', [MutasiController::class, 'store']);
    Route::delete('/mutasi/{id}/destroy', [MutasiController::class, 'destroy']);
    Route::post('/mutasi/{id}/update', [MutasiController::class, 'update']);
});
