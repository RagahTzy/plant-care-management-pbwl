<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Akun Admin
        \App\Models\User::create([
            'name' => 'Eleanor Thorne',
            'email' => 'admin@plantcare.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);

        // Akun User Biasa
        \App\Models\User::create([
            'name' => 'Julian Sterling',
            'email' => 'julian@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'user',
        ]);
    }
}