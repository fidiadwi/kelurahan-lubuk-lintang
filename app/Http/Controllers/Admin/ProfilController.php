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

            'foto_kantor' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'banner_beranda' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'banner_profil' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'banner_perangkat' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'banner_dokumentasi' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'banner_kontak' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

        ]);

        $profil = ProfilKelurahan::first();

        if (!$profil) {
            $profil = new ProfilKelurahan();
        }

        /*
        |--------------------------------------------------------------------------
        | DATA PROFIL
        |--------------------------------------------------------------------------
        */

        $profil->nama_kelurahan = $request->nama_kelurahan;
        $profil->tahun_berdiri = $request->tahun_berdiri;

        $profil->sejarah = $request->sejarah;

        $profil->visi = $request->visi;
        $profil->misi = $request->misi;

        $profil->alamat = $request->alamat;
        $profil->telepon = $request->telepon;
        $profil->email = $request->email;

        $profil->luas_wilayah = $request->luas_wilayah;
        $profil->jumlah_penduduk = $request->jumlah_penduduk;
        $profil->jumlah_kk = $request->jumlah_kk;
        $profil->jumlah_rt_rw = $request->jumlah_rt_rw;

        $profil->batas_utara = $request->batas_utara;
        $profil->batas_selatan = $request->batas_selatan;
        $profil->batas_timur = $request->batas_timur;
        $profil->batas_barat = $request->batas_barat;

        $profil->maps_embed = $request->maps_embed;

        /*
        |--------------------------------------------------------------------------
        | FOTO KANTOR
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto_kantor')) {

            $file = $request->file('foto_kantor');

            $namaFile = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/profil'),
                $namaFile
            );

            $profil->foto_kantor = $namaFile;
        }

        /*
        |--------------------------------------------------------------------------
        | BANNER WEBSITE
        |--------------------------------------------------------------------------
        */

        $bannerFields = [

            'banner_beranda',
            'banner_profil',
            'banner_perangkat',
            'banner_dokumentasi',
            'banner_kontak'

        ];

        foreach ($bannerFields as $field) {

            if ($request->hasFile($field)) {

                $file = $request->file($field);

                $namaFile = time().'_'.$field.'.'.$file->getClientOriginalExtension();

                $file->move(
                    public_path('uploads/profil'),
                    $namaFile
                );

                $profil->$field = $namaFile;
            }
        }

        $profil->save();

        return back()->with(
            'success',
            'Profil Kelurahan berhasil diperbarui.'
        );
    }
}