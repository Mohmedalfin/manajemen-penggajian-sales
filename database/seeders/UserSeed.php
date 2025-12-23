<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Sales;

class UserSeed extends Seeder
{
    public function run(): void
    {
        $this->call(SalesSeed::class); // Pastikan data Sales sudah ada

        User::factory()->admin()->create([
            'username' => 'admin', 
        ]);

        $salesCollection = Sales::limit(10)->get();

        foreach ($salesCollection as $sales) {
            User::factory()->forSales($sales)->create();
        }

        User::factory(2)->admin()->create();
    }
}
