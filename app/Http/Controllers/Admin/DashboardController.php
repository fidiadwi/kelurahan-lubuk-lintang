<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use App\Models\Galeri;
use App\Models\PerangkatKelurahan;
use App\Models\ProfilKelurahan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPesan = Pesan::count();

        $totalGaleri = Galeri::count();

        $totalPerangkat = PerangkatKelurahan::count();

        $totalProfil = ProfilKelurahan::count();

        $notifCount = Pesan::where('status','baru')
            ->count();

        $pesanTerbaru = Pesan::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'totalPesan',
            'totalGaleri',
            'totalPerangkat',
            'totalProfil',
            'notifCount',
            'pesanTerbaru'
        ));
    }
}