<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\LaporanGajiController;
use App\Http\Controllers\Admin\ProfileController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    // Admin Dasboard
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/sales', [SalesController::class, 'index'])->name('admin.sales.index');
    Route::get('admin/barang', [ProdukController::class, 'index'])->name('admin.barang.index');
    Route::get('admin/laporanGaji', [LaporanGajiController::class, 'index'])->name('admin.laporanGaji.index');

    Route::get('admin/profile', [ProfileController::class, 'index'])->name('admin.profil.index');
});
