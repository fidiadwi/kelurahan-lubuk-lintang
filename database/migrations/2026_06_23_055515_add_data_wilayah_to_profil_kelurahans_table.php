<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_kelurahans', function (Blueprint $table) {

            $table->string('luas_wilayah')->nullable();

            $table->string('jumlah_penduduk')->nullable();

            $table->string('jumlah_kk')->nullable();

            $table->string('jumlah_rt_rw')->nullable();

            $table->string('batas_utara')->nullable();

            $table->string('batas_selatan')->nullable();

            $table->string('batas_timur')->nullable();

            $table->string('batas_barat')->nullable();

            $table->longText('maps_embed')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('profil_kelurahans', function (Blueprint $table) {

            $table->dropColumn([
                'luas_wilayah',
                'jumlah_penduduk',
                'jumlah_kk',
                'jumlah_rt_rw',
                'batas_utara',
                'batas_selatan',
                'batas_timur',
                'batas_barat',
                'maps_embed'
            ]);

        });
    }
};