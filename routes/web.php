<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\LaporanGajiController;
use App\Http\Controllers\Sales\ProfileController;
use App\Http\Controllers\Sales\DashboardSalesController;
use App\Http\Controllers\Sales\InputTransaksiController;
use App\Http\Controllers\Sales\PasswordController;

// --- RUTE UNTUK TAMU (BELUM LOGIN) ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// --- RUTE UTAMA (REDIRECT OTOMATIS BERDASARKAN ROLE) ---
Route::middleware('auth')->get('/', function () {
    $user = auth()->user();

    return match ($user->role) {
        'admin' => redirect()->route('admin.dashboard'),
        'sales' => redirect()->route('sales.dashboard'), 
         default => abort(403),
    };
});

// --- RUTE LOGOUT ---
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::patch('/transaksi/{id}/update-status', [TransaksiController::class, 'updateStatus'])
        ->name('transaksi.update-status');

    // Master Data Admin -> Sales
    Route::resource('sales', SalesController::class);
    // (Opsional: Penamaan manual jika resource default konflik)
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

    // Laporan Gaji
    Route::get('/laporan-gaji/export', [LaporanGajiController::class, 'exportExcel'])->name('laporan-gaji.export');
    Route::resource('laporan-gaji', LaporanGajiController::class);

    // Profile Admin
    Route::controller(ProfileController::class)
        ->prefix('profile')
        ->name('profile.')
        ->group(function () {
            Route::get('/', 'viewProfile')->name('index');
            Route::get('/password', 'viewPassword')->name('password.index');
    });
});


Route::middleware(['auth'])->prefix('sales')->name('sales.')->group(function () {
    // 1. Dashboard Sales
    Route::get('/dashboard', [DashboardSalesController::class, 'index'])->name('dashboard');

    // 2. Profil Sales
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profil');
    Route::put('/profil', [ProfileController::class, 'update'])->name('profil.update');

    // 3. Transaksi Input
    Route::get('/transaksi/create', [InputTransaksiController::class, 'create'])->name('transaction.create');
    Route::post('/transaksi/store', [InputTransaksiController::class, 'store'])->name('store');

    Route::get('/password', [PasswordController::class, 'edit'])->name('password');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
});