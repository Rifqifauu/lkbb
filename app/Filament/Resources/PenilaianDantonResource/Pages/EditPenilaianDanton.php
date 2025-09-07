<?php

namespace App\Filament\Resources\PenilaianDantonResource\Pages;

use App\Filament\Resources\PenilaianDantonResource;
use App\Models\PenilaianDanton;
use App\Models\AspekDanton;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditPenilaianDanton extends EditRecord
{
    protected static string $resource = PenilaianDantonResource::class;

    /**
     * Saat membuka halaman edit, kita isi field form (khususnya repeater)
     * dengan nilai saat ini untuk kombinasi (id_peserta, id_user) yang sedang diedit.
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Ambil pasangan yang sedang diedit dari record yang dipilih di tabel
        $pesertaId = $this->record->id_peserta;
        $userId    = $this->record->id_user;

        // Siapkan item repeater: satu item per aspek
        $items = AspekDanton::all()->map(function ($aspek) use ($pesertaId, $userId) {
            $nilai = PenilaianDanton::where('id_peserta', $pesertaId)
                ->where('id_user', $userId)
                ->where('id_aspek', $aspek->id)
                ->value('nilai'); // bisa angka/string; UI akan tetap menyorot sesuai opsi (angka)

            return [
                'id_aspek' => $aspek->id,
                'nilai'    => $nilai,   // biarkan null jika belum pernah dinilai
            ];
        })->toArray();

        // Isi ke form
        $data['id_peserta']       = $pesertaId;
        $data['penilaian_items']  = $items;

        return $data;
    }

    /**
     * Update satu baris per kombinasi (id_peserta, id_user, id_aspek).
     * Radio bisa kirim ANGKA atau STRING-key → kita robust keduanya.
     */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $pesertaId      = $record->id_peserta;  // Select dikunci saat edit
        $penilaianItems = $data['penilaian_items'] ?? [];
        $userId         = $record->id_user;     // biar admin bisa edit milik juri lain juga

        $firstRow = null;

        DB::transaction(function () use ($penilaianItems, $pesertaId, $userId, &$firstRow) {
            foreach ($penilaianItems as $item) {
                $aspekId = $item['id_aspek'] ?? null;
                $raw     = $item['nilai']    ?? null;

                if (! $aspekId || $raw === null || $raw === '') {
                    continue;
                }

                $aspek = AspekDanton::find($aspekId);
                if (! $aspek) continue;

                // Jika nilai sudah angka → langsung pakai; jika string → map ke angka poin aspek
                $nilaiNumerik = is_numeric($raw)
                    ? (int) $raw
                    : ([
                        'kurang_1' => $aspek->kurang_1,
                        'kurang_2' => $aspek->kurang_2,
                        'kurang_3' => $aspek->kurang_3,
                        'cukup_1'  => $aspek->cukup_1,
                        'cukup_2'  => $aspek->cukup_2,
                        'cukup_3'  => $aspek->cukup_3,
                        'baik_1'   => $aspek->baik_1,
                        'baik_2'   => $aspek->baik_2,
                        'baik_3'   => $aspek->baik_3,
                    ][$raw] ?? null);

                if ($nilaiNumerik === null) continue;

                $row = PenilaianDanton::updateOrCreate(
                    [
                        'id_peserta' => $pesertaId,
                        'id_user'    => $userId,   // kunci kombinasi per juri
                        'id_aspek'   => $aspekId,
                    ],
                    [
                        'nilai'      => $nilaiNumerik,
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
