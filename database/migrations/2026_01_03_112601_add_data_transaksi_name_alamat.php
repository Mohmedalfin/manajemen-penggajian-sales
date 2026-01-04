<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transaksi_penjualan', function(Blueprint $table){
            $table->string('nama_pelanggan', 150)
                ->nullable()
                ->after('produk_id');
            
            $table->text('alamat_pelanggan')
                ->nullable()
                ->after('nama_pelanggan')
                ->comment('Snapshot alamat saat transaksi terjadi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_penjualan', function (Blueprint $table) {
            $table->dropColumn([
                'nama_pelanggan',
                'alamat_pelanggan' 
            ]);
        });
    }
};