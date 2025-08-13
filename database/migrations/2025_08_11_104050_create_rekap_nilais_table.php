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
        Schema::create('rekap_nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_peserta')
                ->constrained('peserta')
                ->onDelete('cascade');
            $table->integer('nilai_pbb')->nullable();
            $table->integer('nilai_danton')->nullable();
            $table->integer('nilai_kostum')->nullable();
            $table->integer('nilai_tata_rias')->nullable();
            $table->integer('nilai_variasi_formasi')->nullable();
            $table->integer('nilai_pengurangan')->nullable();
            $table->string('waktu');
            $table->integer('total_utama')->nullable();
            $table->integer('total_umum')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_nilai'); // Corrected table name
    }
};
