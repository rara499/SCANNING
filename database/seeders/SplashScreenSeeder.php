<?php

namespace Database\Seeders;

use App\Models\SplashScreen;
use Illuminate\Database\Seeder;

class SplashScreenSeeder extends Seeder
{
    public function run(): void
    {
        SplashScreen::create([
            'title' => 'Selamat Datang di Dashboard Kami',
            'description' => 'Kelola semua pekerjaanmu dengan lebih mudah dan cepat.',
            'image_path' => 'SCl-removebg-preview.png', 
            'duration' => 10000, 
            'is_active' => true,
        ]);
    }
}