<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilKelurahan extends Model
{
    protected $table = 'profil_kelurahans';

    protected $fillable = [

        'nama_kelurahan',
        'tahun_berdiri',

        'sejarah',

        'visi',
        'misi',

        'alamat',
        'telepon',
        'email',

        'foto_kantor',

        'luas_wilayah',
        'jumlah_penduduk',
        'jumlah_kk',
        'jumlah_rt_rw',

        'batas_utara',
        'batas_selatan',
        'batas_timur',
        'batas_barat',

        'maps_embed',

        'banner_beranda',
        'banner_profil',
        'banner_perangkat',
        'banner_dokumentasi',
        'banner_kontak',
    ];
}