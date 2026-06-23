<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->get();

        $totalGaleri = Galeri::count();

        return view(
            'admin.galeri.index',
            compact(
                'galeri',
                'totalGaleri'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'judul' => 'required',

            'tanggal_kegiatan' => 'required',

            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $foto = null;

        if($request->hasFile('foto'))
        {
            $file = $request->file('foto');

            $foto = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/galeri'),
                $foto
            );
        }

        Galeri::create([

            'judul' => $request->judul,

            'tanggal_kegiatan' => $request->tanggal_kegiatan,

            'foto' => $foto,

            'keterangan' => $request->keterangan

        ]);

        return back()->with(
            'success',
            'Dokumentasi berhasil ditambahkan'
        );
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        $galeri->delete();

        return back()->with(
            'success',
            'Dokumentasi berhasil dihapus'
        );
    }
}