<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\RekapNilai;

class Pemeringkatan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    protected static string $view = 'filament.pages.pemeringkatan';
    protected static ?string $navigationLabel = 'Pemeringkatan';

    // Ambil data untuk kategori utama
    public function getUtama()
    {
        return RekapNilai::with('peserta')
            ->orderByDesc('total_utama')
            ->get();
    }

    // Ambil data untuk kategori umum
    public function getUmum()
    {
        return RekapNilai::with('peserta')
            ->orderByDesc('total_umum')
            ->get();
    }
}
