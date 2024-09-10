<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import correct pour Hash


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'IGF@',
            'email' => 'ifgdev0@gmail.com',
            'password' => Hash::make('P@sser2024'),
            'role' => 'admin',
        ]);
    }
}
