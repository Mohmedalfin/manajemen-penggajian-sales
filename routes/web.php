<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\LaporanGajiController;
use App\Http\Controllers\Admin\ProfileController;


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->get('/', function () {
    $user = auth()->user();

    return match ($user->role) {
        'admin' => redirect()->route('admin.dashboard'),
        'sales' => redirect()->route('sales.dashboard'), // jika ada
        default => abort(403),
    };
});


Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Master Data
    Route::resource('sales', SalesController::class);
    Route::resource('barang', ProdukController::class);

    // Laporan
    Route::resource('laporan-gaji', LaporanGajiController::class);

    // Profile (singleton)
    Route::controller(ProfileController::class)
        ->prefix('profile')
        ->name('profile.')
        ->group(function () {
            Route::get('/', 'viewProfile')->name('index');
            Route::get('/password', 'viewPassword')->name('password.index');
        });
});


Route::middleware(['auth'])->prefix('sales')->name('sales.')->group(function () {

    Route::get('/dashboard', function () {
        return view('sales.dashboard');
    })->name('dashboard');

});
