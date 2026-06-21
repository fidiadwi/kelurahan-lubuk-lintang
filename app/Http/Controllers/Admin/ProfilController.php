<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilKelurahan;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = ProfilKelurahan::first();

        return view(
            'admin.profil.index',
            compact('profil')
        );
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_kelurahan' => 'required',
        ]);

        $profil = ProfilKelurahan::first();

        if(!$profil)
        {
            $profil = new ProfilKelurahan();
        }

        $profil->nama_kelurahan = $request->nama_kelurahan;
        $profil->sejarah = $request->sejarah;
        $profil->visi = $request->visi;
        $profil->misi = $request->misi;
        $profil->alamat = $request->alamat;
        $profil->telepon = $request->telepon;
        $profil->email = $request->email;

        $profil->save();

        return back()->with(
            'success',
            'Profil kelurahan berhasil diperbarui'
        );
    }
}