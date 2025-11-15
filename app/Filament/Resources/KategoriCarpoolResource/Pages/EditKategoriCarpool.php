<?php

namespace App\Filament\Resources\KategoriCarpoolResource\Pages;

use App\Filament\Resources\KategoriCarpoolResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriCarpool extends EditRecord
{
    protected static string $resource = KategoriCarpoolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
