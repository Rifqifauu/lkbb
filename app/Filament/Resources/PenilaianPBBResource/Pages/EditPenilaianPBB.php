<?php

namespace App\Filament\Resources\PenilaianPBBResource\Pages;

use App\Filament\Resources\PenilaianPBBResource;
use App\Models\AspekPBB;
use App\Models\PenilaianPBB;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EditPenilaianPBB extends EditRecord
{
    protected static string $resource = PenilaianPBBResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }

    /** Prefill form saat edit */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $peserta = $this->record->peserta()->first();
        $targetAspekTingkat = PenilaianPBBResource::mapToAspekTingkat($peserta?->tingkat);

        $existing = PenilaianPBB::where('id_peserta', $this->record->id_peserta)
            ->where('id_user', $this->record->id_user)
            ->get()
            ->keyBy('id_aspek');

        // Hanya aspek sesuai kategori
        $data['penilaian_items'] = AspekPBB::where('tingkat', $targetAspekTingkat)
            ->orderBy('id')
            ->get()
            ->map(function ($a) use ($existing) {
                return [
                    'id_aspek'   => $a->id,
                    'nama_aspek' => $a->nama_penilaian,
                    'nilai'      => optional($existing->get($a->id))->nilai,
                ];
            })->toArray();

        return $data;
    }

    /** Simpan ulang semua aspek saat edit */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $pesertaId = $record->id_peserta;
        $userId    = $record->id_user;
        $items     = $data['penilaian_items'] ?? [];

        DB::transaction(function () use ($items, $pesertaId, $userId) {
            foreach ($items as $item) {
                $aspekId = $item['id_aspek'] ?? null;
                $raw     = $item['nilai']    ?? null;
                if (!$aspekId || $raw === null || $raw === '') {
                    continue;
                }

                $nilai = is_numeric($raw) ? (int) $raw : null;
                if ($nilai === null) {
                    continue;
                }

                PenilaianPBB::updateOrCreate(
                    [
                        'id_peserta' => $pesertaId,
                        'id_user'    => $userId,
                        'id_aspek'   => $aspekId,
                    ],
                    ['nilai' => $nilai]
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
