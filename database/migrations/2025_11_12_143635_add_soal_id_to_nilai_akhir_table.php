<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nilai_akhir', function (Blueprint $table) {
            // Tambahkan kolom soal_id
            $table->unsignedBigInteger('soal_id')->nullable()->after('bobot');

            // Tambahkan foreign key ke tabel soal
            $table->foreign('soal_id')
                  ->references('id')
                  ->on('soal')
                  ->onDelete('set null'); // jika soal dihapus, kolom ini akan jadi null
        });
    }

    public function down(): void
    {
        Schema::table('nilai_akhir', function (Blueprint $table) {
            $table->dropForeign(['soal_id']);
            $table->dropColumn('soal_id');
        });
    }
};
