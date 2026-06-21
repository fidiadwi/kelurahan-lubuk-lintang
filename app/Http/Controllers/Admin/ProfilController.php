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

            'foto_kantor' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $profil = ProfilKelurahan::first();

        if(!$profil)
        {
            $profil = new ProfilKelurahan();
        }

        $profil->nama_kelurahan = $request->nama_kelurahan;

        $profil->tahun_berdiri = $request->tahun_berdiri;

        $profil->sejarah = $request->sejarah;

        $profil->visi = $request->visi;

        $profil->misi = $request->misi;

        $profil->alamat = $request->alamat;

        $profil->telepon = $request->telepon;

        $profil->email = $request->email;

        if($request->hasFile('foto_kantor'))
        {
            $file = $request->file('foto_kantor');

            $namaFile = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/profil'),
                $namaFile
            );

            $profil->foto_kantor = $namaFile;
        }

        $profil->save();

        return back()->with(
            'success',
            'Profil Kelurahan berhasil diperbarui'
        );
    }
}