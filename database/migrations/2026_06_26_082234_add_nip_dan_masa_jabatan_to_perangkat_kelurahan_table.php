<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('perangkat_kelurahan', function (Blueprint $table) {

            $table->string('nip')->nullable()->after('jabatan');

            $table->string('masa_jabatan')->nullable()->after('nip');

        });
    }

    public function down(): void
    {
        Schema::table('perangkat_kelurahan', function (Blueprint $table) {

            $table->dropColumn([
                'nip',
                'masa_jabatan'
            ]);

        });
    }
};