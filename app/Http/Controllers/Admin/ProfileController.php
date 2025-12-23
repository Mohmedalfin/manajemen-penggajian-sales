<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Method untuk menampilkan halaman index Data Sales
    public function viewProfile()
    {
        return view('admin.profil');  // Pastikan ada view di resources/views/admin/sales/index.blade.php
    }

    public function viewPassword()
    {
        return view('admin.password');  // Pastikan ada view di resources/views/admin/sales/index.blade.php
    }
}
