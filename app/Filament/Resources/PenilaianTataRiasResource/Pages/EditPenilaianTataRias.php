<?php

namespace App\Filament\Resources\PenilaianTataRiasResource\Pages;

use App\Filament\Resources\PenilaianTataRiasResource;
use App\Models\PenilaianTataRias;
use App\Models\AspekTataRias;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EditPenilaianTataRias extends EditRecord
{
    protected static string $resource = PenilaianTataRiasResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $pesertaId = $this->record->id_peserta;
        $userId    = $this->record->id_user;

        $items = AspekTataRias::all()->map(function ($aspek) use ($pesertaId, $userId) {
            $nilai = PenilaianTataRias::where('id_peserta', $pesertaId)
                ->where('id_user', $userId)
                ->where('id_aspek', $aspek->id)
                ->value('nilai');

            return [
                'id_aspek' => $aspek->id,
                'nilai'    => $nilai,
            ];
        })->toArray();

        $data['id_peserta']      = $pesertaId;
        $data['penilaian_items'] = $items;

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $pesertaId      = $record->id_peserta;
        $userId         = $record->id_user;
        $penilaianItems = $data['penilaian_items'] ?? [];

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

        return $firstRow ? $firstRow->refresh() : $record->refresh();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
