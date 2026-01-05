<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class Sales extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_lengkap',
        'kontak',
        'jabatan',
        'gaji_pokok',
        'target_penjualan_bln',
        'status_aktif',
        'nama_lengkap',
        'no_telepon',
        'alamat',
        'tanggal_lahir',
        'foto',
    ];

    protected $casts = [
        'gaji_pokok' => 'decimal:2',
        'target_penjualan_bln' => 'decimal:2',
        'status_aktif' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($sales) {
            $lastSales = Sales::orderBy('id', 'desc')->first();
            
            if (!$lastSales) {
                $number = 1;
            } else {
                $number = intval(substr($lastSales->kode_sales, -3)) + 1;
            }

            $sales->kode_sales = 'SLS-' . str_pad($number, 3, '0', STR_PAD_LEFT);
        });

        static::created(function ($sales) {
            User::create([
                'username'      => $sales->kode_sales, 
                'password_hash' => Hash::make('sales'), 
                'role'          => 'sales',
                'sales_id'      => $sales->id, 
            ]);

            // 2. Persiapkan Kirim WhatsApp
            $token = 'kgeU6DB4KmFEnVjFyDA4'; 
            $target = $sales->kontak;

            if (str_starts_with($target, '0')) {
                $target = '62' . substr($target, 1);
            }

            $pesan = "Halo *{$sales->nama_lengkap}*,\n\n" .
                    "Akun Sales Anda telah berhasil didaftarkan.\n" .
                    "Username: *{$sales->kode_sales}*\n" .
                    "Password: *sales*\n\n" .
                    "Silakan gunakan akun ini untuk login ke aplikasi.";

            // 3. Kirim via API Fonnte (Menggunakan HTTP Client Laravel)
            try {
                Http::withHeaders([
                    'Authorization' => $token,
                ])->post('https://api.fonnte.com/send', [
                    'target' => $target,
                    'message' => $pesan,
                ]);
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error("Gagal kirim WA ke {$target}: " . $e->getMessage());
            }   
        });
    }

    public function transaksi_penjualan()
    {
        return $this->hasMany(TransaksiPenjualan::class, 'sales_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'sales_id', 'sales_id');
    }

    public function laporanGaji()
    {
        return $this->hasMany(LaporanGaji::class, 'sales_id', 'sales_id');
    }
}
