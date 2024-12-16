<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\auth_controller;  // Corrected controller name

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
*/

Route::middleware('auth')->group(function () {
Route::get('/', [ReservasiController::class, 'pelanggan'])->name('pelanggan.pelanggan');

//rute crud kamar dan reservasi
Route::resource('reservasi', ReservasiController::class);
Route::resource('kamar', KamarController::class);

// rute ke halaman lain di sidebar
Route::get('pelanggan.pelanggan', [ReservasiController::class, 'pelanggan'])->name('pelanggan');
Route::get('reservasi.index', [ReservasiController::class, 'index'])->name('index');
Route::get('kamar.index', [KamarController::class, 'index'])->name('index');
});

// Halaman login untuk guest (belum login)
Route::get('/login', function () {
    return view('Auth.Login');
})->middleware('guest')->name('login');

//rute input data pelanggan dengan login/tanpalogin
Route::get('reservasi.create', [ReservasiController::class, 'create'])->name('reservasi.create');
Route::post('/reservasi/store', [ReservasiController::class, 'store'])->name('reservasi.store');

// Proses login
Route::post('/login-proses', [auth_controller::class, 'login'])->name('loginproccess');
// Logout
Route::post('/logout', [auth_controller::class, 'logout'])->name('logout');