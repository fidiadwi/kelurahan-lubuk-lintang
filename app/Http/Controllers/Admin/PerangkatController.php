<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerangkatKelurahan;
use Illuminate\Http\Request;

class PerangkatController extends Controller
{
    public function index()
    {
        $perangkat = PerangkatKelurahan::orderBy('urutan')
            ->get();

        $totalPerangkat = PerangkatKelurahan::count();

        return view(
            'admin.perangkat.index',
            compact(
                'perangkat',
                'totalPerangkat'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'nama' => 'required',

            'jabatan' => 'required',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $foto = null;

        if($request->hasFile('foto'))
        {
            $file = $request->file('foto');

            $foto = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/perangkat'),
                $foto
            );
        }

        PerangkatKelurahan::create([

            'nama' => $request->nama,

            'jabatan' => $request->jabatan,

            'foto' => $foto,

            'urutan' => $request->urutan ?? 0

        ]);

        return back()->with(
            'success',
            'Data perangkat berhasil ditambahkan'
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'nama' => 'required',

            'jabatan' => 'required'

        ]);

        $perangkat = PerangkatKelurahan::findOrFail($id);

        $foto = $perangkat->foto;

        if($request->hasFile('foto'))
        {
            $file = $request->file('foto');

            $foto = time().'_'.$file->getClientOriginalName();

            $file->move(
                public_path('uploads/perangkat'),
                $foto
            );
        }

        $perangkat->update([

            'nama' => $request->nama,

            'jabatan' => $request->jabatan,

            'urutan' => $request->urutan,

            'foto' => $foto

        ]);

        return back()->with(
            'success',
            'Data perangkat berhasil diperbarui'
        );
    }

    public function destroy($id)
    {
        $perangkat = PerangkatKelurahan::findOrFail($id);

        $perangkat->delete();

        return back()->with(
            'success',
            'Data perangkat berhasil dihapus'
        );
    }
}