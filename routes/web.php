<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TransaksiController;
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
        'sales' => redirect()->route('sales.dashboard'), 
        default => abort(403),
    };
});


Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::patch('/transaksi/{id}/update-status', [TransaksiController::class, 'updateStatus'])
        ->name('transaksi.update-status');

    // Master Data Admin -> Sales
    Route::resource('sales', SalesController::class);
    Route::resource('admin/sales', SalesController::class)->names([
         'store' => 'admin.sales.store',
    ]);
    Route::put('/sales/{sale}', [SalesController::class, 'update'])->name('sales.update');
    Route::delete('/sales/{sale}', [SalesController::class, 'destroy'])->name('sales.destroy');

    // Master Data Admin -> Barang
    Route::resource('barang', ProdukController::class);
    Route::resource('admin/barang', ProdukController::class)->names([
        'store' => 'admin.barang.store',
    ]);
    Route::put('/barang/{barang}', [ProdukController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{barang}', [ProdukController::class,'destroy'])->name('barang.destroy');

    // Laporan
    Route::get('/laporan-gaji/export', [LaporanGajiController::class, 'exportExcel'])->name('laporan-gaji.export');
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
