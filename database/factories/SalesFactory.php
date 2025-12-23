<?php

namespace Database\Factories;

use App\Models\Sales;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesFactory extends Factory
{
    /**
     * Nama Model yang sesuai dengan Factory ini.
     *
     * @var string
     */
    protected $model = Sales::class;

    /**
     * Definisikan state default Model.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Tentukan secara acak, tapi gunakan Junior, Middle, Senior paling sering
        $jabatan = $this->faker->randomElement(['Junior', 'Middle', 'Senior']);
        
        // Atur Gaji dan Target berdasarkan Jabatan yang terpilih
        $gajiPokok = 0.00;
        $targetPenjualan = 0.00;

        switch ($jabatan) {
            case 'Junior':
                $gajiPokok = 3000000.00;
                $targetPenjualan = $this->faker->numberBetween(30, 50) * 1000000; // 30Jt - 50Jt
                break;
            case 'Middle':
                $gajiPokok = 4000000.00;
                $targetPenjualan = $this->faker->numberBetween(50, 80) * 1000000; // 50Jt - 80Jt
                break;
            case 'Senior':
                $gajiPokok = 5000000.00;
                $targetPenjualan = $this->faker->numberBetween(80, 150) * 1000000; // 80Jt - 150Jt
                break;
            default: // Trainee
                $gajiPokok = 2500000.00;
                $targetPenjualan = 20000000.00;
        }

        return [
            // Menggunakan bahasa Indonesia yang terlihat realistis
            'nama_lengkap' => $this->faker->firstName() . ' ' . $this->faker->lastName(), 
            'kontak' => $this->faker->numerify('08##########'),
            'jabatan' => $jabatan, 
            'gaji_pokok' => $gajiPokok,
            'target_penjualan_bln' => $targetPenjualan,
            'status_aktif' => $this->faker->boolean(90), 
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
    
    // --- METHOD STATE SPESIFIK JABATAN (Untuk kontrol lebih lanjut) ---
    public function junior(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'jabatan' => 'Junior',
            'gaji_pokok' => 3000000.00,
        ]);
    }

    public function senior(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'jabatan' => 'Senior',
            'gaji_pokok' => 5000000.00,
        ]);
    }

    public function nonAktif(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'status_aktif' => false,
        ]);
    }
}