<?php

namespace App\Http\Controllers;

use App\Models\ProfilKelurahan;
use App\Models\PerangkatKelurahan;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
    {
        $profil = ProfilKelurahan::first();
        if(!$profil)
        {
            $profil = new ProfilKelurahan();
        }

        $perangkat = PerangkatKelurahan::orderBy('urutan')
            ->take(8)
            ->get();

        $galeri = Galeri::latest()
            ->take(6)
            ->get();

        $totalPerangkat =
            PerangkatKelurahan::count();

        $totalGaleri =
            Galeri::count();

        return view(
            'public.home',
            compact(
                'profil',
                'perangkat',
                'galeri',
                'totalPerangkat',
                'totalGaleri'
            )
        );
    }
}