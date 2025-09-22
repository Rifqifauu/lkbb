<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('aspek_variasi_formasi', function (Blueprint $table) {
            $table->dropColumn(['kurang_3', 'cukup_3', 'baik_3']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aspek_variasi_formasi', function (Blueprint $table) {
            $table->integer('kurang_3')->nullable();
            $table->integer('cukup_3')->nullable();
            $table->integer('baik_3')->nullable();
        });
    }
};
