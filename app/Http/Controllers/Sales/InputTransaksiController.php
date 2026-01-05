<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\TransaksiSalesService;

class InputTransaksiController extends Controller
{
    protected $transaksiSalesService;

    public function __construct(TransaksiSalesService $transaksiSalesService)
    {
        $this->transaksiSalesService = $transaksiSalesService;
    }

    
    public function create()
    {
        $products = $this->transaksiSalesService->getActiveProducts();
        return view('sales.input', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_date' => 'required|date',
            'customer_name'    => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            'product_id'       => 'required|exists:produk,id',
            'quantity'         => 'required|integer|min:1',
            'price'            => 'required|numeric|min:0',
            'proof_image'      => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'notes'            => 'nullable|string|max:500',
        ]);

        $user = Auth::user();
        $salesId = $user->sales->id ?? null; 

        if (!$salesId) {
            return back()->with('error', 'Akun Anda tidak terdaftar sebagai Sales.');
        }

        try {
            $this->transaksiSalesService->storeTransaction(
                $request->all(), 
                $request->file('proof_image'),
                $salesId
            );

            return back()->with('success', 'Transaksi berhasil disimpan! Silakan input lagi.');            
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }
}