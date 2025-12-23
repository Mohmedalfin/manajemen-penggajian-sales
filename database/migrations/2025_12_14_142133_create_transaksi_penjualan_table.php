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
        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->id('transaksi_id');

            $table->date('tanggal_transaksi');

            // FK ke sales.id
            $table->foreignId('sales_id')
                ->constrained('sales')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            // FK ke produk.produk_id
            $table->string('produk_id', 10);

            $table->integer('jumlah_unit')->default(0);

            $table->decimal('harga_total', 10, 2)->default(0);
            $table->decimal('komisi_yang_dihitung', 10, 2)->default(0);

            $table->timestamps();

            $table->index(['tanggal_transaksi', 'sales_id']);
            $table->index('produk_id');

            $table->foreign('produk_id')
                ->references('produk_id')
                ->on('produk')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penjualan');
    }
};
