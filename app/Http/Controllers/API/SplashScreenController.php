<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SplashScreen;
use Illuminate\Http\JsonResponse;

class SplashScreenController extends Controller
{
    public function index(): JsonResponse
    {
        // Mengambil data splash screen pertama yang statusnya aktif
        $splash = SplashScreen::where('is_active', true)->first();

        if (!$splash) {
            return response()->json([
                'success' => false,
                'message' => 'Splash screen data tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Splash Screen',
            'data' => [
                'title'       => $splash->title,
                'description' => $splash->description,
                'image_url'   => asset($splash->image_path), // Mengubah path menjadi URL penuh
                'duration'    => $splash->duration,
            ]
        ], 200);
    }
}