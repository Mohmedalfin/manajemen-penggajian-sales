<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\DashboardSalesService; 
use App\Models\TransaksiPenjualan;

class DashboardSalesController extends Controller
{
    protected $dashboardSalesService;

    public function __construct(DashboardSalesService $dashboardSalesService)
    {
        $this->dashboardSalesService = $dashboardSalesService;
    }

    public function index(Request $request)
    {
        $bulan = date('m');
        $tahun = date('Y');
        
        $userSales = auth()->user()->sales;
        $salesId   = $userSales->id; 

        $query = TransaksiPenjualan::with(['sales', 'barang']) // Pastikan relasi 'produk' ada di Model
                ->where('sales_id', $salesId);

        if ($request->filled('search')) {
            $search = $request->search;
            
            $query->where(function ($q) use ($search) {
                $q->where('kode_transaksi', 'like', "%{$search}%")
                ->orWhere('nama_pelanggan', 'like', "%{$search}%")
                ->orWhereHas('barang', function ($subQ) use ($search) {
                    $subQ->where('nama_produk', 'like', "%{$search}%");
                });
            });
        }

        $riwayatTransaksi = $query->latest()->get();


        $summary = $this->dashboardSalesService->summaryBulananPerSales($bulan, $tahun, $salesId);

        $target    = $userSales->target_penjualan_bln; // Sesuaikan nama kolom di DB Anda
        $gajiPokok = $userSales->gaji_pokok;

        $transaksiValid = TransaksiPenjualan::where('sales_id', $salesId)
            ->whereMonth('tanggal_transaksi', $bulan) 
            ->whereYear('tanggal_transaksi', $tahun)
            ->where('status_verifikasi', 'approved'); 

        $realisasi   = (clone $transaksiValid)->sum('harga_total');
        $totalKomisi = (clone $transaksiValid)->sum('komisi_penjualan');

        $persentase = $target > 0 ? ($realisasi / $target) * 100 : 0;
        $totalGaji  = $gajiPokok + $totalKomisi;

        return view('sales.dashboard', compact(
            'summary', 
            'riwayatTransaksi',
            'target', 
            'realisasi', 
            'persentase', 
            'gajiPokok', 
            'totalKomisi', 
            'totalGaji'
        ));
    }

    
    
}