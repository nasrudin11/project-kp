<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return view('/layouts/main',  ['title' => 'Home Page']);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'role:user'])->name('dashboard');
Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::get('/dashboard', [ChartController::class, 'showChart']);
Route::get('/admin-dashboard', [ChartController::class, 'showChart']);

Route::get('/data-harga', function (){
    return view('/dashboard/user/data-harga', ['title' => 'Data Produk']);
})->middleware('auth');

Route::get('/data-pasokan', function (){
    return view('/dashboard/user/data-pasokan', ['title' => 'Data Produk']);
})->middleware('auth');

Route::get('/update-harga', function (){
    return view('/dashboard/user/laporan-harga', ['title' => 'Update Harga']);
})->middleware('auth');

Route::get('/update-harga', function (){
    return view('/dashboard/user/laporan-harga', ['title' => 'Update Pasokan']);
})->middleware('auth');

Route::get('/profile', function (){
    return view('/dashboard/user/profile', ['title' => 'Profile']);
})->middleware('auth');

// Data produk
Route::get('/admin-dashboard/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::post('/admin-dashboard/tambah-produk', [ProdukController::class, 'store'])->name('produk.store');
Route::put('/admin-dashboard/update-produk{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/admin-dashboard/delete-produk{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

// web.php
Route::get('/admin-dashboard/data-produk', [ProdukController::class, 'getProdukData'])->name('produk.data');


// Data akun user
Route::get('/admin-dashboard/akun-user', [UserController::class, 'index'])->name('user.index');
Route::post('/admin-dashboard/user-baru', [UserController::class, 'store'])->name('user.store');

// Data lokasi
Route::get('/admin-dashboard/data-lokasi', [LokasiController::class, 'index']);
Route::get('/admin-dashboard/data-lokasi/pasar', [LokasiController::class, 'getPasarData'])->name('lokasi.pasar.data');
Route::get('/admin-dashboard/data-lokasi/kecamatan', [LokasiController::class, 'getKecamatanData'])->name('lokasi.kecamatan.data');

// Data lokasi
Route::get('/admin-dashboard/data-lokasi', [LokasiController::class, 'index']);
Route::get('/admin-dashboard/data-lokasi/pasar', [LokasiController::class, 'getPasarData'])->name('lokasi.pasar.data');
Route::get('/admin-dashboard/data-lokasi/kecamatan', [LokasiController::class, 'getKecamatanData'])->name('lokasi.kecamatan.data');

Route::middleware('web')->group(function () {
    Route::put('/api/update-lokasi', [LokasiController::class, 'updateLokasi']);
    Route::delete('/api/delete-lokasi/{id}', [LokasiController::class, 'deleteLokasi']);
});




