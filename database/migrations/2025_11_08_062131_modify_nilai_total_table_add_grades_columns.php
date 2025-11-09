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
        Schema::table('nilai_total', function (Blueprint $table) {
            $table->json('nilai_details')->nullable(); // Store all grades as JSON
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nilai_total', function (Blueprint $table) {
            $table->dropColumn('nilai_details');
        });
    }
};
