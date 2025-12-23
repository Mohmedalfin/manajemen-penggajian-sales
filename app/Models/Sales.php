<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sales extends Model
{
    use HasFactory;

    protected $primaryKey = 'sales_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_lengkap',
        'kontak',
        'jabatan',
        'gaji_pokok',
        'target_penjualan_bln',
        'status_aktif',
    ];

    protected $casts = [
        'gaji_pokok' => 'decimal:2',
        'target_penjualan_bln' => 'decimal:2',
        'status_aktif' => 'boolean',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'sales_id', 'sales_id');
    }

    public function transaksi()
    {
        return $this->hasMany(TransaksiPenjualan::class, 'sales_id', 'sales_id');
    }

    public function laporanGaji()
    {
        return $this->hasMany(LaporanGaji::class, 'sales_id', 'sales_id');
    }
}
