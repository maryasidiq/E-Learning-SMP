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
        Schema::create('jawaban_latihan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('latihan_id');
            $table->unsignedBigInteger('soal_latihan_id');
            $table->unsignedBigInteger('siswa_id');
            $table->text('jawaban')->nullable();
            $table->boolean('is_correct')->default(false);
            $table->decimal('skor', 5, 2)->default(0);
            $table->decimal('nilai_akhir', 5, 2)->nullable();
            $table->timestamps();

            $table->foreign('latihan_id')->references('id')->on('latihan')->onDelete('cascade');
            $table->foreign('soal_latihan_id')->references('id')->on('soal_latihan')->onDelete('cascade');
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');

            $table->unique(['latihan_id', 'soal_latihan_id', 'siswa_id'], 'unique_jawaban_latihan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_latihan');
    }
};
