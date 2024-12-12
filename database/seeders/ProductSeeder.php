<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'user_id' => 2,
            'type' => 'product',
            'name' => 'Piano',
            'description' => 'A beautiful piano',
            'price' => 1000,
            'SKU' => 'P001',
            'image' => 'piano.jpg',
            'category_id' => 1,
        ]);
    }
}
