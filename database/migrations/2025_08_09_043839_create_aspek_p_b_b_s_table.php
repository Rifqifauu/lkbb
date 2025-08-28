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
        Schema::create('aspek_pbb', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penilaian');
            $table->integer('kurang_1');
            $table->integer('kurang_2');
            $table->integer('kurang_3');
            $table->integer('cukup_1');
            $table->integer('cukup_2');
            $table->integer('cukup_3');
            $table->integer('baik_1');
            $table->integer('baik_2');
            $table->integer('baik_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspek_pbb');
    }
};
