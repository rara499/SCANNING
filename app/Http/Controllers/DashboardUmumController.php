<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardUmumController extends Controller
{
    public function index()
    {
        // Mengembalikan tampilan view dashboard_umum.blade.php
        return view('dashboardUmum'); 
    }
}
