<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerangkatKelurahan extends Model
{
    protected $table = 'perangkat_kelurahan';

    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'urutan'
    ];
}