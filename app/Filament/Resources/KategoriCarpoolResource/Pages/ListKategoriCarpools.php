<?php

namespace App\Filament\Resources\KategoriCarpoolResource\Pages;

use App\Filament\Resources\KategoriCarpoolResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriCarpools extends ListRecords
{
    protected static string $resource = KategoriCarpoolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
