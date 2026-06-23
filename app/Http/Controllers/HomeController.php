<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProfilKelurahan;
use App\Models\PerangkatKelurahan;
use App\Models\Galeri;
use App\Models\Pesan;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | BERANDA
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $profil = ProfilKelurahan::first();

        if (!$profil) {
            $profil = new ProfilKelurahan();
        }

        $perangkat = PerangkatKelurahan::orderBy('urutan')
            ->take(4)
            ->get();

        $galeri = Galeri::latest()
            ->take(6)
            ->get();

        $totalPerangkat = PerangkatKelurahan::count();

        $totalGaleri = Galeri::count();

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

    /*
    |--------------------------------------------------------------------------
    | PROFIL KELURAHAN
    |--------------------------------------------------------------------------
    */

    public function profil()
    {
        $profil = ProfilKelurahan::first();

        if (!$profil) {
            $profil = new ProfilKelurahan();
        }

        return view(
            'public.profil',
            compact('profil')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PERANGKAT KELURAHAN
    |--------------------------------------------------------------------------
    */

   public function perangkat()
    {
        $profil = ProfilKelurahan::first();

        if (!$profil) {
            $profil = new ProfilKelurahan();
        }

        $perangkat = PerangkatKelurahan::orderBy('urutan')
            ->get();

        $lurah = $perangkat->first();

        return view(
            'public.perangkat',
            compact(
                'profil',
                'perangkat',
                'lurah'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DOKUMENTASI KEGIATAN
    |--------------------------------------------------------------------------
    */

    public function dokumentasi()
    {
        $profil = ProfilKelurahan::first();

        $galeri = Galeri::latest()
            ->paginate(12);

        return view(
            'public.dokumentasi',
            compact(
                'profil',
                'galeri'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | KONTAK & ASPIRASI
    |--------------------------------------------------------------------------
    */

    public function kontak()
    {
        $profil = ProfilKelurahan::first();

        if (!$profil) {
            $profil = new ProfilKelurahan();
        }

        return view(
            'public.kontak',
            compact('profil')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | KIRIM ASPIRASI
    |--------------------------------------------------------------------------
    */

    public function kirimAspirasi(Request $request)
    {
        $request->validate([
            'nama'   => 'required|max:100',
            'no_hp'  => 'required|max:20',
            'subjek' => 'required|max:255',
            'pesan'  => 'required'
        ]);

        Pesan::create([

            'nama'   => $request->nama,
            'no_hp'  => $request->no_hp,
            'subjek' => $request->subjek,
            'pesan'  => $request->pesan,
            'status' => 'baru'

        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Aspirasi berhasil dikirim.'
            );
    }
}