<?php

namespace App\Filament\Resources\PenilaianSeragamResource\Pages;

use App\Filament\Resources\PenilaianSeragamResource;
use App\Models\AspekSeragam;
use App\Models\PenilaianSeragam;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EditPenilaianSeragam extends EditRecord
{
    protected static string $resource = PenilaianSeragamResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $pesertaId = $this->record->id_peserta;
        $userId    = $this->record->id_user;

        $existing = PenilaianSeragam::where('id_peserta', $pesertaId)
            ->where('id_user', $userId)
            ->get()
            ->keyBy('id_aspek');

        $data['penilaian_items'] = AspekSeragam::orderBy('id')->get()->map(function ($a) use ($existing) {
            $row = $existing->get($a->id);

            return [
                'id_aspek'   => $a->id,
                'nama_aspek' => $a->nama_penilaian,
                'nilai'      => $row?->nilai, // auto isi string key
            ];
        })->toArray();

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $pesertaId = $record->id_peserta;
        $userId    = $record->id_user;
        $items     = $data['penilaian_items'] ?? [];

        DB::transaction(function () use ($items, $pesertaId, $userId) {
            foreach ($items as $item) {
                $aspekId = $item['id_aspek'] ?? null;
                $raw     = $item['nilai']    ?? null;

                if (!$aspekId) continue;

                PenilaianSeragam::updateOrCreate(
                    [
                        'id_peserta' => $pesertaId,
                        'id_user'    => $userId,
                        'id_aspek'   => $aspekId,
                    ],
                    ['nilai' => $raw] // simpan string key
                );
            }
        });

        return $record->refresh();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
