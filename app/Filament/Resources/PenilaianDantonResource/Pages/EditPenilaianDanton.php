<?php

namespace App\Filament\Resources\PenilaianDantonResource\Pages;

use App\Filament\Resources\PenilaianDantonResource;
use App\Models\PenilaianDanton;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use App\Models\AspekDanton;
use Illuminate\Support\Facades\Auth;

class EditPenilaianDanton extends EditRecord
{
    protected static string $resource = PenilaianDantonResource::class;

 protected function handleRecordUpdate(Model $record, array $data): Model
{
    $pesertaId = $data['id_peserta'];
    $penilaianItems = $data['penilaian_items'] ?? [];

    $updatedRecords = [];

    foreach ($penilaianItems as $aspekId => $item) {
        if (!empty($item['nilai'])) {
            // Ambil Aspek
            $aspek = AspekDanton::find($aspekId);

            if (!$aspek) {
                continue; // Jika aspek tidak ditemukan, lanjutkan ke aspek berikutnya
            }

            // Mapping nilai ke angka
            $nilaiMapping = [
                'kurang_1' => $aspek->kurang_1,
                'kurang_2' => $aspek->kurang_2,
                'cukup_1' => $aspek->cukup_1,
                'cukup_2' => $aspek->cukup_2,
                'baik_1' => $aspek->baik_1,
                'baik_2' => $aspek->baik_2,
            ];

            $nilaiNumerik = $nilaiMapping[$item['nilai']] ?? null;

            if ($nilaiNumerik === null) {
                continue; // Skip jika nilai tidak valid
            }

            // Cari atau buat record penilaian
            $existingRecord = PenilaianDanton::where('id_peserta', $pesertaId)
                ->where('id_aspek', $aspekId)
                ->where('id_user', Auth::user()->id)
                ->first();

            if ($existingRecord) {
                // Update record yang ada
                $existingRecord->update([
                    'nilai' => $nilaiNumerik,
                ]);
                $updatedRecords[] = $existingRecord;
            } else {
                // Jika tidak ada record, buat yang baru
                $record = PenilaianDanton::create([
                    'id_peserta' => $pesertaId,
                    'id_user' => Auth::user()->id,
                    'id_aspek' => $aspekId,
                    'nilai' => $nilaiNumerik,
                ]);
                $updatedRecords[] = $record;
            }
        }
    }

    return $updatedRecords[0] ?? $record;
}


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
