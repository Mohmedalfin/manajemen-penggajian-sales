<?php

namespace App\Services;

use App\Models\TransaksiPenjualan;

class DashboardSalesService
{
    public function summaryBulananPerSales(int $bulan, int $tahun, int $salesId): array
    {
        // KITA GUNAKAN $salesId YANG DIKIRIM DARI CONTROLLER
        // Jadi tidak perlu pakai Auth::user() di sini lagi agar fungsi lebih fleksibel
        
        $queryBulanIni = TransaksiPenjualan::where('sales_id', $salesId)
            ->whereMonth('tanggal_transaksi', $bulan)
            ->whereYear('tanggal_transaksi', $tahun);

        return [
            'totalUnitBulanIni' => (clone $queryBulanIni)
                ->where('status_verifikasi', 'approved') 
                ->sum('jumlah_unit'),

            'totalPenjualan' => (clone $queryBulanIni)
                ->where('status_verifikasi', 'approved') 
                ->sum('harga_total'),

            'totalKomisi' => (clone $queryBulanIni)
                ->where('status_verifikasi', 'approved') 
                ->sum('komisi_penjualan'),

            'totalTransaksi' => (clone $queryBulanIni)
                ->where('status_verifikasi', 'approved') 
                ->count()        
        ];
    }
}