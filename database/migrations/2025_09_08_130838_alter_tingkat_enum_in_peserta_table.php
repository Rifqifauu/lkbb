<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Ubah enum tingkat: tambah 'sd'
        DB::statement("ALTER TABLE peserta MODIFY tingkat ENUM('sd', 'sltp', 'slta') NOT NULL");
    }

    public function down(): void
    {
        // Balikin ke semula (tanpa sd)
        DB::statement("ALTER TABLE peserta MODIFY tingkat ENUM('sltp', 'slta') NOT NULL");
    }
};
