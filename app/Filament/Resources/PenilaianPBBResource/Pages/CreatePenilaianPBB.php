<?php

namespace App\Filament\Resources\PenilaianPBBResource\Pages;

use App\Filament\Resources\PenilaianPBBResource;
use App\Models\PenilaianPBB;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Models\AspekPBB;
use Illuminate\Support\Facades\Auth;
class CreatePenilaianPBB extends CreateRecord
{
    protected static string $resource = PenilaianPBBResource::class;
protected function handleRecordCreation(array $data): Model
{
    $pesertaId = $data['id_peserta'];
    $penilaianItems = $data['penilaian_items'] ?? [];

    $createdRecords = [];

    foreach ($penilaianItems as $item) {
        if (!empty($item['nilai']) && !empty($item['id_aspek'])) {
            // Ambil Aspek
            $aspek = AspekPBB::find($item['id_aspek']);

            // Mapping nilai string ke angka
            $nilaiMapping = [
                  'kurang_1' => $aspek->kurang_1,
                'kurang_2' => $aspek->kurang_2,
                'kurang_3' => $aspek->kurang_3,
                'cukup_1' => $aspek->cukup_1,
                'cukup_2' => $aspek->cukup_2,
                'cukup_3' => $aspek->cukup_3,
                'baik_1' => $aspek->baik_1,
                'baik_2' => $aspek->baik_2,
                'baik_3' => $aspek->baik_3,
            ];

            $nilaiNumerik = $nilaiMapping[$item['nilai']] ?? null;

            if ($nilaiNumerik === null) {
                continue; // Skip jika nilai tidak valid
            }

            // Cek record lama
            $existingRecord = PenilaianPBB::where('id_peserta', $pesertaId)
    ->where('id_aspek', $item['id_aspek'])
    ->where('id_user', Auth::user()->id) // tambah filter user penilai
    ->first();


            if ($existingRecord) {
                $existingRecord->update([
                    'nilai' => $nilaiNumerik,
                ]);
                $createdRecords[] = $existingRecord;
            } else {
                $record = PenilaianPBB::create([
                    'id_peserta' => $pesertaId,
                    'id_user' => Auth::user()->id,
                    'id_aspek' => $item['id_aspek'],
                    'nilai' => $nilaiNumerik,
                ]);
                $createdRecords[] = $record;
            }
        }
    }

    return $createdRecords[0] ?? new PenilaianPBB();
}

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
