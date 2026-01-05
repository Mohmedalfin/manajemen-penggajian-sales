<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    // TAMBAHKAN FUNCTION INI (Untuk menampilkan halaman)
    public function edit()
    {
        return view('sales.password'); // Pastikan nama file blade Anda 'sales/password.blade.php'
    }

    public function update(UpdatePasswordRequest $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password_hash)) {
            return back()->withErrors(['current_password' => 'Kata sandi saat ini salah.']);
        }

        $user->username = $request->username;
        $user->password_hash = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Akun berhasil diperbarui! Gunakan password baru untuk login selanjutnya.');
    }
}