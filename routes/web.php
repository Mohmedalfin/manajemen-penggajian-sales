<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- 1. LOGIN & AUTHENTICATION ---
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('auth.login'); 
})->name('login');

Route::post('/login', function (Request $request) {
    // Data Dummy
    $email = strtolower($request->input('email'));
    $password = $request->input('password');

    $dummyUsers = [
        'admin@gmail.com' => ['password' => 'admin123', 'role' => 'admin'],
        'sales@gmail.com' => ['password' => 'sales123', 'role' => 'sales'],
    ];

    if (isset($dummyUsers[$email]) && $password === $dummyUsers[$email]['password']) {
        $role = $dummyUsers[$email]['role'];
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'sales') {
            return redirect()->route('sales.dashboard');
        }
    }

    return redirect()->back()->withErrors(['email' => 'Email atau password salah.']);
})->name('login.attempt');

Route::post('/logout', function () {
    return redirect()->route('login');
})->name('logout');


// --- 2. ROUTE GROUP ADMIN ---
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('admin.dashboard');
    Route::get('/data-sales', function () { return view('admin.data-sales'); })->name('admin.data_sales');
    Route::get('/data-barang', function () { return view('admin.data-barang'); })->name('admin.data_barang');
    Route::get('/laporan-gaji', function () { return view('admin.laporan-gaji'); })->name('admin.laporan_gaji');
    
    // --- TAMBAHAN BARU: PROFIL & PASSWORD ADMIN ---
    
    // 1. Halaman Edit Profil
    Route::get('/profil', function () { return view('admin.profil'); })->name('admin.profil');

    // 2. Halaman Ubah Kata Sandi
    Route::get('/password', function () { return view('admin.password'); })->name('admin.password');

    // 3. Proses Simpan Kata Sandi (Dummy)
    Route::put('/password/update', function (Request $request) {
        return redirect()->route('admin.dashboard')->with('success', 'Kata sandi admin berhasil diperbarui!');
    })->name('admin.password.update');

    // ----------------------------------------------
});

// --- 3. ROUTE GROUP SALES ---
Route::prefix('sales')->group(function () {
    
    // Dashboard Sales
    Route::get('/dashboard', function () {
        return view('sales.dashboard'); 
    })->name('sales.dashboard');

    // Halaman Input Penjualan
    Route::get('/input-penjualan', function () {
        return view('sales.input'); 
    })->name('sales.input');

    // Halaman Profil Sales
    Route::get('/profil', function () {
        return view('sales.profil'); 
    })->name('sales.profil');
    
    // --- TAMBAHAN BARU: KATA SANDI ---
    
    // Halaman Ubah Kata Sandi
    Route::get('/password', function () {
        return view('sales.password'); 
    })->name('sales.password');

    // Proses Simpan Kata Sandi (Dummy Redirect)
    Route::put('/password/update', function (Request $request) {
        // Di sini logika update DB nanti
        return redirect()->route('sales.dashboard')->with('success', 'Kata sandi berhasil diperbarui!');
    })->name('password.update');

    // ---------------------------------

    // Route Simpan Transaksi
    Route::post('/simpan-transaksi', function (Request $request) {
        return redirect()->route('sales.dashboard')->with('success', 'Data berhasil disimpan!');
    })->name('sales.store');

});