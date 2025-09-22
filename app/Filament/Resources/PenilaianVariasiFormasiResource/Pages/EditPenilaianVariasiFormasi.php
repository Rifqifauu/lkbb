<?php

namespace App\Filament\Resources\PenilaianVariasiFormasiResource\Pages;

use App\Filament\Resources\PenilaianVariasiFormasiResource;
use App\Models\AspekVariasiFormasi;
use App\Models\PenilaianVariasiFormasi;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EditPenilaianVariasiFormasi extends EditRecord
{
    protected static string $resource = PenilaianVariasiFormasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * Prefill form saat edit
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $pesertaId = $this->record->id_peserta;
        $userId    = $this->record->id_user;

        // Ambil nilai yang sudah ada
        $existing = PenilaianVariasiFormasi::where('id_peserta', $pesertaId)
            ->where('id_user', $userId)
            ->get()
            ->keyBy('id_aspek');

        // Isi repeater dengan semua aspek
        $data['penilaian_items'] = AspekVariasiFormasi::orderBy('id')->get()->map(function ($a) use ($existing) {
            return [
                'id_aspek'   => $a->id,
                'nama_aspek' => $a->nama_penilaian,
                'nilai'      => optional($existing->get($a->id))->nilai, // nilai lama kalau ada
            ];
        })->toArray();

        return $data;
    }

    /**
     * Simpan ulang semua aspek saat edit
     */
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

                PenilaianVariasiFormasi::updateOrCreate(
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
