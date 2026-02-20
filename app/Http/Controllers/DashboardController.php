<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Ssb;
use App\Models\JadwalLatihan;
use App\Models\JadwalTurnamen;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalSiswa' => Siswa::count(),
            'totalSSB' => Ssb::count(),
            'totalLatihan' => JadwalLatihan::count(),
            'totalTurnamen' => JadwalTurnamen::count(),
        ]);
    }
}
