<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilKelurahan extends Model
{
    protected $table = 'profil_kelurahans';

    protected $fillable = [
        'nama_kelurahan',
        'sejarah',
        'visi',
        'misi',
        'alamat',
        'telepon',
        'email'
    ];
}