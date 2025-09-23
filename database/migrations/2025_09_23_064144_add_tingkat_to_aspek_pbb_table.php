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
        Schema::table('aspek_pbb', function (Blueprint $table) {
            $table->enum('tingkat', ['sd', 'sltp_slta'])->default('sltp_slta')->after('nama_penilaian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aspek_pbb', function (Blueprint $table) {
            $table->dropColumn('tingkat');
        });
    }
};
