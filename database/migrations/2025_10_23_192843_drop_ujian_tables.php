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
        Schema::dropIfExists('soal_ujian');
        Schema::dropIfExists('ujian');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Note: This migration is irreversible as it drops tables
        // In a real scenario, you might want to recreate the tables here
        // but since we're removing the ujian module entirely, we don't need to reverse this
    }
};
