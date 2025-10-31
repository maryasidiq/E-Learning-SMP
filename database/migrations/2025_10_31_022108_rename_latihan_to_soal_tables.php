<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Rename tables
        Schema::rename('latihan', 'soal');
        Schema::rename('soal_latihan', 'soal_detail');
        Schema::rename('jawaban_latihan', 'jawaban_soal');

        // Update foreign key column names
        Schema::table('soal_detail', function (Blueprint $table) {
            $table->renameColumn('latihan_id', 'soal_id');
        });

        Schema::table('jawaban_soal', function (Blueprint $table) {
            $table->renameColumn('latihan_id', 'soal_id');
            $table->renameColumn('soal_latihan_id', 'soal_detail_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverse foreign key column names
        Schema::table('jawaban_soal', function (Blueprint $table) {
            $table->renameColumn('soal_id', 'latihan_id');
            $table->renameColumn('soal_detail_id', 'soal_latihan_id');
        });

        Schema::table('soal_detail', function (Blueprint $table) {
            $table->renameColumn('soal_id', 'latihan_id');
        });

        // Reverse table renames
        Schema::rename('soal', 'latihan');
        Schema::rename('soal_detail', 'soal_latihan');
        Schema::rename('jawaban_soal', 'jawaban_latihan');
    }
};
