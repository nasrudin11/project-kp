<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataLaporanProdukController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return view('/layouts/main',  ['title' => 'Home Page']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/data-harga', [DataLaporanProdukController::class, 'index_harga_user']);
    Route::get('/dashboard/data-pasokan', [DataLaporanProdukController::class, 'index_pasokan_user']);
    Route::get('/dashboard/data-harga/form_input', [DataLaporanProdukController::class, 'form_input_data'])->name('form_laporan');
    Route::post('/dashboard/data-harga/store', [DataLaporanProdukController::class, 'store'])->name('data.input.store');
    Route::put('/harga/update', [DataLaporanProdukController::class, 'update_harga_user'])->name('update_harga_user');
    
    Route::get('/data-pasokan', function (){
        return view('/dashboard/user/data-pasokan', ['title' => 'Data Produk']);
    });
    
    Route::get('dashboard/profile', function (){
        return view('/dashboard/user/profile', ['title' => 'Profile']);
    });

    Route::post('/dashboard/profile/update-akun-user', [UserController::class, 'update_profile'])->name('profile-user.update');
    Route::post('/dashboard/password/update-akun-user', [UserController::class, 'updatePassword'])->name('profile-user.update-password');

});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    // Dashboard Admin
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Data Produk
    Route::get('/admin-dashboard/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/admin-dashboard/tambah-produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::put('/admin-dashboard/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/admin-dashboard/produk/delete/{id}', [ProdukController::class, 'delete'])->name('produk.destroy');
    Route::delete('/api/delete-produk/{id}', [ProdukController::class, 'deleteProduk']);

    // Data akun user
    Route::get('/admin-dashboard/akun-user', [UserController::class, 'index'])->name('user.index');
    Route::post('/admin-dashboard/user-baru', [UserController::class, 'store'])->name('user.store');

    // Data lokasi
    Route::get('/admin-dashboard/data-lokasi', [LokasiController::class, 'index']);
    // Pasar
    Route::post('/admin-dashboard/data-lokasi/pasar', [LokasiController::class, 'storePasar'])->name('store.pasar');
    Route::put('/admin-dashboard/pasar/update/{id}', [LokasiController::class, 'updatePasar'])->name('update.pasar');
    Route::delete('/admin-dashboard/pasar/delete/{id}', [LokasiController::class, 'destroyPasar'])->name('delete.pasar');
    
    // Kecamatan
    Route::post('/admin-dashboard/data-lokasi/kecamatan', [LokasiController::class, 'storeKecamatan'])->name('store.kecamatan');
    Route::put('/admin-dashboard/kecamatan/update/{id}', [LokasiController::class, 'updateKecamatan'])->name('update.kecamatan');
    Route::delete('/admin-dashboard/kecamatan/delete/{id}', [LokasiController::class, 'destroyKecamatan'])->name('delete.kecamatan');

    // Data Harga
    Route::get('/admin-dashboard/data-harga', [DataLaporanProdukController::class, 'index']);
    Route::get('/harga-produk/data', [DataLaporanProdukController::class, 'getData'])->name('harga-produk.data');

    // Data Pasokan
    Route::get('/admin-dashboard/data-pasokan', function (){
        return view('/dashboard/admin/data-pasokan', ['title' => 'Data Pasokan']);
    });

    // Lihat dan Update Profile Administrator
    Route::get('/admin-dashboard/profile', function (){
        return view('/dashboard/admin/profile', ['title' => 'Profile Administrator']);
    });
    Route::post('/admin-dashboard/profile/update', [UserController::class, 'update_profile'])->name('profile.update');
    Route::post('/admin-dashboard/password/update', [UserController::class, 'updatePassword'])->name('password.update');

    // Lihat dan Update Profile Akun User    
    Route::get('/admin-dashboard/profile-akun-user/{id}', [UserController::class, 'editProfileAkunUser'])->name('profile-akun-user');
    Route::put('/admin-dashboard/profile/update-akun-user/{id}', [UserController::class, 'updateProfile_akunUser'])->name('profile-akun-user.update');
    Route::put('/admin-dashboard/password/update-akun-user/{id}', [UserController::class, 'updatePassword__akunUser'])->name('profile-akun-user.update-password');


    
    Route::middleware('web')->group(function () {
        Route::put('/api/update-lokasi', [LokasiController::class, 'updateLokasi']);
        Route::delete('/api/delete-lokasi/{id}', [LokasiController::class, 'deleteLokasi']);
    });
});


// Route::get('/dashboard', [ChartController::class, 'showChart']);
// Route::get('/admin-dashboard', [ChartController::class, 'showChart']);



// // Data produk
// Route::get('/admin-dashboard/produk', [ProdukController::class, 'index'])->name('produk.index');
// Route::post('/admin-dashboard/tambah-produk', [ProdukController::class, 'store'])->name('produk.store');
// Route::put('/admin-dashboard/update-produk{id}', [ProdukController::class, 'update'])->name('produk.update');
// Route::delete('/admin-dashboard/delete-produk{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

// web.php
// Route::get('/admin-dashboard/data-harga', [DataLaporanProdukController::class, 'index'])->name('data-harga');



