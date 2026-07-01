<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('perangkat_kelurahan', function (Blueprint $table) {

            $table->string('level')
                ->nullable()
                ->after('jabatan');

            $table->unsignedBigInteger('parent_id')
                ->nullable()
                ->after('level');

        });
    }

    public function down(): void
    {
        Schema::table('perangkat_kelurahan', function (Blueprint $table) {

            $table->dropColumn([
                'level',
                'parent_id'
            ]);

        });
    }
};