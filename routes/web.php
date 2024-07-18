<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ChartController;

Route::get('/', function () {
    return view('/layouts/main',  ['title' => 'Home Page']);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'role:user'])->name('dashboard');
Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::get('/dashboard', [ChartController::class, 'showChart']);

Route::get('/data-harga', function (){
    return view('/dashboard/user/data-harga', ['title' => 'Data Produk']);
})->middleware('auth');

Route::get('/data-pasokan', function (){
    return view('/dashboard/user/data-pasokan', ['title' => 'Data Produk']);
})->middleware('auth');

Route::get('/update-harga', function (){
    return view('/dashboard/user/update-harga', ['title' => 'Update Harga']);
})->middleware('auth');

Route::get('/profile', function (){
    return view('/dashboard/user/profile', ['title' => 'Profile']);
})->middleware('auth');





// Route::middleware(['guest'])->group(function(){
//     Route::get('/login', [LoginController::class, 'index'])->name('login');
//     Route::post('/login', [LoginController::class, 'login']);
// });

// Route::get('/home', function () {
//     if (auth()->user()->role == 'user') {
//         return redirect('/dashboard/user');
//     } elseif (auth()->user()->role == 'admin') {
//         return redirect('/dashboard/admin');
//     }
// });

// Route::middleware(['auth'])->group(function() {
//     Route::get('/dashboard/user', [UserController::class, 'user']) ->middleware('userAccess:user') ;
//     Route::get('/dashboard/admin', [UserController::class, 'admin'])->middleware('userAccess:admin');
//     Route::get('/logout', [LoginController::class, 'logout']);
// });
