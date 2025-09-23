<?php

namespace App\Filament\Resources\PenilaianTataRiasResource\Pages;

use App\Filament\Resources\PenilaianTataRiasResource;
use App\Models\PenilaianTataRias;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreatePenilaianTataRias extends CreateRecord
{
    protected static string $resource = PenilaianTataRiasResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $pesertaId      = $data['id_peserta'] ?? null;
        $penilaianItems = $data['penilaian_items'] ?? [];
        $userId         = Auth::id();

        $firstRow = null;

        DB::transaction(function () use ($penilaianItems, $pesertaId, $userId, &$firstRow) {
            foreach ($penilaianItems as $item) {
                if (empty($item['id_aspek']) || ($item['nilai'] === null || $item['nilai'] === '')) {
                    continue;
                }

                $nilaiNumerik = is_numeric($item['nilai']) ? (int)$item['nilai'] : null;
                if ($nilaiNumerik === null) continue;

                $row = PenilaianTataRias::updateOrCreate(
                    [
                        'id_peserta' => $pesertaId,
                        'id_user'    => $userId,
                        'id_aspek'   => $item['id_aspek'],
                    ],
                    [
                        'nilai' => $nilaiNumerik,
                    ]
                );

                $firstRow ??= $row;
            }
        });

        return $firstRow ?? new PenilaianTataRias();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
