<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_kelurahans', function (Blueprint $table) {

            $table->string('banner_beranda')->nullable()->after('foto_kantor');
            $table->string('banner_profil')->nullable()->after('banner_beranda');
            $table->string('banner_perangkat')->nullable()->after('banner_profil');
            $table->string('banner_dokumentasi')->nullable()->after('banner_perangkat');
            $table->string('banner_kontak')->nullable()->after('banner_dokumentasi');

        });
    }

    public function down(): void
    {
        Schema::table('profil_kelurahans', function (Blueprint $table) {

            $table->dropColumn([
                'banner_beranda',
                'banner_profil',
                'banner_perangkat',
                'banner_dokumentasi',
                'banner_kontak'
            ]);

        });
    }
};