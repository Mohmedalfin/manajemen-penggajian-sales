<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Sales; 
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash; 

class UserFactory extends Factory
{
    /**
     * Nama Model yang sesuai dengan Factory ini.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Definisikan state default Model (Default kita jadikan Sales).
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'password_hash' => Hash::make('password'), // Password default: 'password'
            'username' => $this->faker->unique()->userName(),
            
            'role' => 'sales', 
            'sales_id' => null, 
            
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * State untuk User dengan role Admin.
     * Admin tidak memiliki sales_id.
     */
    public function admin(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'username' => 'admin_' . $this->faker->unique()->randomNumber(4),
            'role' => 'admin',
            'sales_id' => null, 
        ]);
    }
    
    /**
     * State untuk User dengan role Sales.
     * Sales HARUS memiliki relasi 1:1 ke tabel sales.
     * Ini adalah logika yang harus Anda gunakan di Seeder.
     *
     * @param Sales|null $sales
     */
    public function forSales(Sales $sales = null): Factory
    {
        return $this->state(fn () => [
            'username' => 'sales_' . $this->faker->unique()->randomNumber(4),
            'role' => 'sales',
            'sales_id' => $sales
                ? $sales->id
                : Sales::factory()->create()->id,
        ]);
    }
}