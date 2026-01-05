<?php

namespace App\Services;

use App\Models\TransaksiPenjualan;

class TransaksiService
{
    public function statusTransaksi(int $bulan, int $tahun): array
    {
        $queryBulanIni = TransaksiPenjualan::whereMonth('tanggal_transaksi', $bulan)
            ->whereYear('tanggal_transaksi', $tahun);

        return [
            'totalPending'  => (clone $queryBulanIni)->where('status_verifikasi', 'pending')->count(),
            'totalApproved' => (clone $queryBulanIni)->where('status_verifikasi', 'approved')->count(),
            'totalRejected' => (clone $queryBulanIni)->where('status_verifikasi', 'rejected')->count(),
        ];
    }
}