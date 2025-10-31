<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, convert existing string values to JSON arrays or null
        DB::statement("UPDATE soal_detail SET gambar = '[]' WHERE gambar IS NULL OR gambar = ''");
        DB::statement("UPDATE soal_detail SET gambar = CONCAT('[\"', REPLACE(gambar, '\"', '\\\"'), '\"]') WHERE gambar IS NOT NULL AND gambar != '' AND gambar NOT LIKE '[%'");

        Schema::table('soal_detail', function (Blueprint $table) {
            $table->json('gambar')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('soal_detail', function (Blueprint $table) {
            $table->string('gambar')->nullable()->change();
        });
    }
};
