<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\TransaksiFactory;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_penjualan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_transaksi',
        'tanggal_transaksi',
        'sales_id',
        'produk_id',
        'nama_pelanggan',    
        'alamat_pelanggan',
        'status_verifikasi',
        'bukti_transaksi',
        'verified_by',
        'jumlah_unit',
        'harga_total',
        'komisi_penjualan',
    ];

    protected $casts = [
        'tanggal_transaksi' => 'date',
        'jumlah_unit' => 'integer',
        'harga_total' => 'decimal:2',
        'komisi_penjualan' => 'decimal:2',
    ];

    protected static function newFactory()
    {
        return TransaksiFactory::new();
    }

    public function sales()
    {
        return $this->belongsTo(Sales::class, 'sales_id', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'produk_id', 'id');
    }
}
