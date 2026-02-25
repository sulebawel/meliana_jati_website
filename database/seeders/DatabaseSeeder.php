<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat Admin User
        User::firstOrCreate(
            ['email' => 'admin@melianajati.com'],
            [
                'name' => 'Admin Meliana Jati',
                'email' => 'admin@melianajati.com',
                'password' => Hash::make('Admin@123456'),
                'role' => 'admin',
            ]
        );

        // Buat Test User
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );
    }
}
