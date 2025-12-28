<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Barang;
use App\Models\TransaksiPenjualan;
use App\Models\LaporanGajiController;
use App\Services\TransaksiService;

class TransaksiController extends Controller
{
    public function index(Request $request, TransaksiService $dashboard)
    {
        $query = TransaksiPenjualan::with(['sales', 'barang']);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('kode_transaksi', 'like', "%{$search}%")
                ->orWhereHas('sales', fn ($subQ) =>
                    $subQ->where('nama_lengkap', 'like', "%{$search}%")
                )
                ->orWhereHas('barang', fn ($subQ) =>
                    $subQ->where('nama_produk', 'like', "%{$search}%")
                )
                ->orWhere('status_verifikasi', 'like', "%{$search}%"); 
            });
        }

        $summary = $dashboard->statusTransaksi(now()->month, now()->year);

        $pertransaksi = $query
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin.transaksi-verifikasi', [
            ...$summary,
            'pertransaksi' => $pertransaksi,
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_verifikasi' => 'required|in:pending,approved,rejected'
        ]);

        $transaksi = TransaksiPenjualan::findOrFail($id);
        $transaksi->update([
            'status_verifikasi' => $request->status_verifikasi
        ]);

        return redirect()->back()->with('success', 'Status transaksi berhasil diperbarui!');
    }
}
