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
        Schema::rename('quis', 'latihan');
        Schema::rename('soal_quis', 'soal_latihan');

        // Rename columns in soal_latihan table
        Schema::table('soal_latihan', function (Blueprint $table) {
            $table->renameColumn('quis_id', 'latihan_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverse column rename
        Schema::table('soal_latihan', function (Blueprint $table) {
            $table->renameColumn('latihan_id', 'quis_id');
        });

        // Reverse table renames
        Schema::rename('latihan', 'quis');
        Schema::rename('soal_latihan', 'soal_quis');
    }
};
