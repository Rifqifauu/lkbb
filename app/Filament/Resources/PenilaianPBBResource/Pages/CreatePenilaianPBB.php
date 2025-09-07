<?php

namespace App\Filament\Resources\PenilaianPBBResource\Pages;

use App\Filament\Resources\PenilaianPBBResource;
use App\Models\AspekPBB;
use App\Models\PenilaianPBB;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreatePenilaianPBB extends CreateRecord
{
    protected static string $resource = PenilaianPBBResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $pesertaId      = $data['id_peserta'];
        $items          = $data['penilaian_items'] ?? [];
        $userId         = Auth::id();

        $first = null;

        DB::transaction(function () use ($items, $pesertaId, $userId, &$first) {
            foreach ($items as $item) {
                $aspekId = $item['id_aspek'] ?? null;
                $raw     = $item['nilai']    ?? null;
                if (!$aspekId || $raw === null || $raw === '') continue;

                $aspek = AspekPBB::find($aspekId);
                if (!$aspek) continue;

                // Terima angka langsung; kalau string, map ke angka
                $nilai = is_numeric($raw) ? (int)$raw : ([
                    'kurang_1' => (int)$aspek->kurang_1,
                    'kurang_2' => (int)$aspek->kurang_2,
                    'kurang_3' => (int)$aspek->kurang_3,
                    'cukup_1'  => (int)$aspek->cukup_1,
                    'cukup_2'  => (int)$aspek->cukup_2,
                    'cukup_3'  => (int)$aspek->cukup_3,
                    'baik_1'   => (int)$aspek->baik_1,
                    'baik_2'   => (int)$aspek->baik_2,
                    'baik_3'   => (int)$aspek->baik_3,
                ][$raw] ?? null);

                if ($nilai === null) continue;

                $row = PenilaianPBB::updateOrCreate(
                    ['id_peserta' => $pesertaId, 'id_user' => $userId, 'id_aspek' => $aspekId],
                    ['nilai' => $nilai]
                );

                $first ??= $row;
            }
        });

        return $first ?? new PenilaianPBB();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
