<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Coba Login
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('sales.dashboard');
            }
        }

        // --- BAGIAN INI YANG DIUBAH ---
        // Hapus (atau comment) bagian ValidationException
        /*
        throw ValidationException::withMessages([
            'username' => ['The provided credentials are incorrect.'],
        ]);
        */

        // Ganti dengan ini agar bisa ditangkap sebagai Alert
        return back()->with('loginError', 'Login Gagal! Username atau Password salah.');
    }

    

    public function showLoginForm()
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role;
            if ($userRole == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($userRole == 'sales') {
                return redirect()->route('sales.dashboard');
            }
        }
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}