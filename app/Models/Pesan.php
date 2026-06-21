<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $fillable = [

        'nama',
        'no_hp',
        'subjek',
        'pesan',
        'balasan',
        'status'

    ];
}