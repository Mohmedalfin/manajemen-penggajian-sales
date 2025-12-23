<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    // Method untuk menampilkan halaman index Data Sales
    public function index()
    {
        // $sales = Sales::all();
        return view('admin.data-sales');  // Pastikan ada view di resources/views/admin/sales/index.blade.php
    }
}
