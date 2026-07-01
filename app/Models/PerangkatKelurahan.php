<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerangkatKelurahan extends Model
{
    protected $table = 'perangkat_kelurahan';

    protected $fillable = [

        'nama',
        'jabatan',
        'level',
        'parent_id',
        'nip',
        'masa_jabatan',
        'foto',
        'urutan'

    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI KE ATAS
    |--------------------------------------------------------------------------
    */

    public function parent()
    {
        return $this->belongsTo(
            PerangkatKelurahan::class,
            'parent_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI KE BAWAH
    |--------------------------------------------------------------------------
    */

    public function children()
    {
        return $this->hasMany(
            PerangkatKelurahan::class,
            'parent_id'
        )->orderBy('urutan');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPE LEVEL
    |--------------------------------------------------------------------------
    */

    public function scopeLurah($query)
    {
        return $query->where('level', 'lurah');
    }

    public function scopeSekretaris($query)
    {
        return $query->where('level', 'sekretaris');
    }

    public function scopeKasi($query)
    {
        return $query->where('level', 'kasi');
    }

    public function scopeStaf($query)
    {
        return $query->where('level', 'staf');
    }

    public function scopeRw($query)
    {
        return $query->where('level', 'rw');
    }

    public function scopeRt($query)
    {
        return $query->where('level', 'rt');
    }
}