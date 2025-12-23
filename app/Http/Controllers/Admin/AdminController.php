<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales;

class AdminController extends Controller
{
    public function index()
    {
        $totalSales = Sales::count();
        return view('admin.dashboard', compact('totalSales'));  // Pastikan view ada di resources/views/admin/dashboard.blade.php
    }


}
