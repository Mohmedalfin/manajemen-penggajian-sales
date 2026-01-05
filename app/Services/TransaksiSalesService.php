<?php

namespace App\Services;

use App\Models\Barang;
use App\Models\TransaksiPenjualan;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TransaksiSalesService
{
    /**
     * Mengambil produk aktif untuk dropdown
     */
    public function getActiveProducts()
    {
        return Barang::select('id', 'nama_produk', 'stok', 'harga_jual_unit')
                     ->where('stok', '>', 0)
                     ->get();
    }

    /**
     * Logic menyimpan transaksi
     */
    public function storeTransaction(array $data, ?UploadedFile $proofImage, $salesId)
    {
        // 1. Hitung harga & komisi
        $hargaSatuan = $data['price'];
        $jumlah = $data['quantity'];
        $totalHarga = $hargaSatuan * $jumlah;
        
        $persentaseKomisi = 0.05; // 5%
        $komisi = $totalHarga * $persentaseKomisi;

        $pathBukti = null;
        if ($proofImage) {
            $namaFile = time() . '_' . Str::random(10) . '.' . $proofImage->getClientOriginalExtension();
            $pathBukti = $proofImage->storeAs('bukti_transaksi', $namaFile, 'public');
        }

        $kodeTransaksi = 'TRX-' . strtoupper(Str::random(8));

        $transaksi = TransaksiPenjualan::create([
            'kode_transaksi'    => $kodeTransaksi,
            'tanggal_transaksi' => $data['transaction_date'],
            'sales_id'          => $salesId,
            'produk_id'         => $data['product_id'],
            'nama_pelanggan'    => $data['customer_name'],
            'alamat_pelanggan'  => $data['customer_address'],
            'jumlah_unit'       => $jumlah,
            'harga_total'       => $totalHarga,
            'komisi_penjualan'  => $komisi,
            'status_verifikasi' => 'pending',
            'bukti_transaksi'   => $pathBukti,
        ]);

        // 5. Kurangi Stok
        $produk = Barang::find($data['product_id']);
        if ($produk) {
            $produk->decrement('stok', $jumlah);
        }

        return $transaksi;
    }
}