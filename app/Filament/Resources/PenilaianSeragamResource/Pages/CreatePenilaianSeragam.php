<?php

namespace App\Filament\Resources\PenilaianSeragamResource\Pages;

use App\Filament\Resources\PenilaianSeragamResource;
use App\Models\PenilaianSeragam;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreatePenilaianSeragam extends CreateRecord
{
    protected static string $resource = PenilaianSeragamResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $pesertaId = $data['id_peserta'];
        $penilaianItems = $data['penilaian_items'] ?? [];

        $createdRecords = [];

        foreach ($penilaianItems as $item) {
            if (!empty($item['nilai']) && !empty($item['id_aspek'])) {
                $record = PenilaianSeragam::updateOrCreate(
                    [
                        'id_peserta' => $pesertaId,
                        'id_aspek'   => $item['id_aspek'],
                        'id_user'    => Auth::id(),
                    ],
                    [
                        'nilai' => $item['nilai'], // langsung simpan string key
                    ]
                );
                $createdRecords[] = $record;
            }
        }

        return $createdRecords[0] ?? new PenilaianSeragam();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
