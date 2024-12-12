<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'user_id' => 3,
            'type' => 'course',
            'name' => 'Piano Basics',
            'description' => 'Learn the fundamentals of piano playing with our comprehensive beginner course.',
            'price' => 100,
            'SKU' => 'PB001',
            'image' => 'piano.jpg',
            'category_id' => 1
        ]);

        Item::create([
            'user_id' => 3,
            'type' => 'course',
            'name' => 'Guitar 101',
            'description' => 'Learn the fundamentals of guitar playing with our comprehensive beginner course.',
            'price' => 50,
            'SKU' => 'G101',
            'image' => 'piano.jpg',
            'category_id' => 2
        ]);
    }
}
