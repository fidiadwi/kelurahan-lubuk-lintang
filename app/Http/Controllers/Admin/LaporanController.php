<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LaporanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::latest()->get();

        $totalPesan = Pesan::count();

        $pesanBaru = Pesan::where('status', 'baru')->count();

        $sudahDibalas = Pesan::where('status', 'dibalas')->count();

        return view('admin.laporan.index', compact(
            'pesans',
            'totalPesan',
            'pesanBaru',
            'sudahDibalas'
        ));
    }

    public function balas(Request $request, $id)
    {
        $request->validate([
            'balasan' => 'required'
        ]);

        $pesan = Pesan::findOrFail($id);

        try {

            Http::withHeaders([
                'Authorization' => env('FONNTE_TOKEN')
            ])->post('https://api.fonnte.com/send', [

                'target' => $pesan->no_hp,

                'message' =>
                    "Balasan Kelurahan Lubuk Lintang\n\n" .
                    "Subjek : " . $pesan->subjek . "\n\n" .
                    $request->balasan

            ]);

            $pesan->update([
                'balasan' => $request->balasan,
                'status' => 'dibalas'
            ]);

            return back()->with(
                'success',
                'Balasan berhasil dikirim ke WhatsApp'
            );

        } catch (\Exception $e) {

            return back()->with(
                'error',
                'Gagal mengirim balasan WhatsApp'
            );

        }
    }

    public function dibaca($id)
    {
        $pesan = Pesan::findOrFail($id);

        $pesan->update([
            'status' => 'dibaca'
        ]);

        return back()->with(
            'success',
            'Pesan telah ditandai sebagai dibaca'
        );
    }

    public function destroy($id)
    {
        $pesan = Pesan::findOrFail($id);

        $pesan->delete();

        return back()->with(
            'success',
            'Pesan berhasil dihapus'
        );
    }
}