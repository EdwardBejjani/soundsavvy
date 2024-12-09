<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'phone' => '123456789',
            'address' => 'address'
        ]);
        User::create([
            'name' => 'vendor',
            'email' => 'vendor@vendor.com',
            'password' => bcrypt('vendor'),
            'role' => 'vendor',
            'phone' => '123456789',
            'address' => 'address'
        ]);
        User::create([
            'name' => 'instructor',
            'email' => 'instructor@instructor.com',
            'password' => bcrypt('instructor'),
            'role' => 'instructor',
            'phone' => '123456789',
            'address' => 'address'
        ]);
    }
}
