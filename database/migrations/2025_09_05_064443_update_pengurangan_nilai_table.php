<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Update tabel pengurangan_nilai
        Schema::table('pengurangan_nilai', function (Blueprint $table) {
            $table->integer('jml_anggota_penalti')->nullable()->after('id');
            $table->integer('durasi_penalti')->nullable()->comment('Durasi penalti dalam detik')->after('jml_anggota_penalti');
        });

        // Update tabel aspek_pengurangan_nilai
        Schema::table('aspek_pengurangan_nilai', function (Blueprint $table) {
            $table->integer('pengurangan')->nullable()->change(); // pengurangan bisa null
            $table->integer('per_durasi')->nullable()->after('pengurangan');
            $table->integer('per_anggota')->nullable()->after('per_durasi');
        });
    }

    public function down(): void
    {
        // Rollback pengurangan_nilai
        Schema::table('pengurangan_nilai', function (Blueprint $table) {
            $table->dropColumn(['jml_anggota_penalti', 'durasi_penalti']);
        });

        // Rollback aspek_pengurangan_nilai
        Schema::table('aspek_pengurangan_nilai', function (Blueprint $table) {
            $table->integer('pengurangan')->nullable(false)->change(); // balikin ke not null
            $table->dropColumn(['per_durasi', 'per_anggota']);
        });
    }
};
