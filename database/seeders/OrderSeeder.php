<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'user_id' => 2,
            'status' => 'pending',
            'total_price' => 100,
        ]);

        Order::create([
            'user_id' => 2,
            'status' => 'completed',
            'total_price' => 200,
        ]);

        Order::create([
            'user_id' => 2,
            'status' => 'cancelled',
            'total_price' => 300,
        ]);

        Order::create([
            'user_id' => 2,
            'status' => 'refunded',
            'total_price' => 400,
        ]);
    }
}
