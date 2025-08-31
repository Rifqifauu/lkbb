<?php

namespace App\Filament\Resources\PenilaianDantonResource\Pages;

use App\Filament\Resources\PenilaianDantonResource;
use App\Models\PenilaianDanton;
use App\Models\AspekDanton;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CreatePenilaianDanton extends CreateRecord
{
    protected static string $resource = PenilaianDantonResource::class;

    /**
     * Simpan satu baris per kombinasi (id_peserta, id_user, id_aspek)
     * - Radio di form mengirim ANGKA => langsung cast ke int
     * - Jika ternyata kirim STRING key, fallback map ke angka
     */
    protected function handleRecordCreation(array $data): Model
    {
        $pesertaId      = $data['id_peserta'] ?? null;
        $penilaianItems = $data['penilaian_items'] ?? [];
        $userId         = Auth::id();

        if (! $pesertaId || empty($penilaianItems)) {
            throw ValidationException::withMessages([
                'penilaian_items' => 'Penilaian belum diisi.',
            ]);
        }

        $firstRow = null;

        DB::transaction(function () use ($penilaianItems, $pesertaId, $userId, &$firstRow) {
            foreach ($penilaianItems as $item) {
                if (empty($item['id_aspek']) || ($item['nilai'] === null || $item['nilai'] === '')) {
                    continue;
                }

                $aspek = AspekDanton::find($item['id_aspek']);
                if (! $aspek) {
                    continue;
                }

                // ✅ jika radio mengirim angka, langsung pakai
                $nilaiNumerik = is_numeric($item['nilai'])
                    ? (int) $item['nilai']
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
                    ][$item['nilai']] ?? null);

                if ($nilaiNumerik === null) {
                    continue;
                }

                $row = PenilaianDanton::updateOrCreate(
                    [
                        'id_peserta' => $pesertaId,
                        'id_user'    => $userId,              // ← PEMBEDA antar juri
                        'id_aspek'   => $item['id_aspek'],
                    ],
                    [
                        'nilai'      => $nilaiNumerik,
                    ]
                );

                $firstRow ??= $row;
            }
        });

        if (! $firstRow) {
            throw ValidationException::withMessages([
                'penilaian_items' => 'Tidak ada penilaian yang valid untuk disimpan.',
            ]);
        }

        return $firstRow;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
