<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Portfolio;
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

        // Sample Portfolio Data
        Portfolio::updateOrCreate(
            ['title' => 'Meja tarik 3M'],
            [
                'description' => 'Desain ruang tamu dengan konsep minimalis dan elegan yang cocok untuk keluarga',
                'image' => 'https://i.pinimg.com/736x/f3/7e/41/f37e41c85359b456b1e915f9db8875b4.jpg'
            ]
        );

        Portfolio::updateOrCreate(
            ['title' => 'Meja piknik kotak'],
            [
                'description' => 'Desain ruang makan dengan konsep modern yang cocok untuk cafe',
                'image' => 'https://i.pinimg.com/736x/a5/30/09/a5300988a96b0d461377a3fa372692e5.jpg'
            ]
        );

        Portfolio::updateOrCreate(
            ['title' => 'Kursi lempit'],
            [
                'description' => 'Desain ruang kantor dengan konsep moderen dan nyaman',
                'image' => 'https://i.pinimg.com/1200x/3b/50/11/3b50113f31a1693e9fc4dec698dfae45.jpg'
            ]
        );

        Portfolio::updateOrCreate(
            ['title' => 'Almari makan'],
            [
                'description' => 'Desain furniture custom untuk ruang tamu dengan konsep minimalis dan elegan',
                'image' => 'https://i.pinimg.com/736x/f4/04/ed/f404ed0a384b307902e8bd5f64d55f39.jpg'
            ]
        );

        Portfolio::updateOrCreate(
            ['title' => 'Meja makan'],
            [
                'description' => 'Desain ruang makan dengan konsep modern dan elegan yang cocok untuk keluarga',
                'image' => 'https://i.pinimg.com/1200x/d8/ea/86/d8ea863baa2d59c5de03f775cf7e1138.jpg'
            ]
        );

        Portfolio::updateOrCreate(
            ['title' => 'Kursi belajar'],
            [
                'description' => 'Furnitur custom untuk ruang belajar anak dengan desain yang fun dan edukatif',
                'image' => 'https://i.pinimg.com/1200x/69/52/01/69520193fbc2c2f7be1128a7b0bc531f.jpg'
            ]
        );
    }
}

