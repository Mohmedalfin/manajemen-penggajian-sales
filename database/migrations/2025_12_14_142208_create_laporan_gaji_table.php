<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_gaji', function (Blueprint $table) {
            $table->id('laporan_gaji_id');

            // FK ke sales.id
            $table->foreignId('sales_id')
                ->constrained('sales')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('periode_bulan', 7);

            $table->decimal('gaji_pokok_total', 10, 2)->default(0);
            $table->decimal('komisi_total', 10, 2)->default(0);
            $table->decimal('total_gaji_dibayarkan', 10, 2)->default(0);

            $table->timestamps();

            $table->index(['sales_id', 'periode_bulan']);
            $table->unique(['sales_id', 'periode_bulan'], 'uq_laporan_gaji_sales_periode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_gaji');
    }
};
