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
        Schema::create('pengurangan_nilai', function (Blueprint $table) {
    $table->id();

    // Cara 1: Langsung pakai foreignId + constrained
    $table->foreignId('id_aspek')->constrained('aspek_pengurangan_nilai')->onDelete('cascade');
    $table->foreignId('id_peserta')->constrained('peserta')->onDelete('cascade');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurangan_nilais');
    }
};
