<?php

namespace App\Filament\Resources\KategoriMobilResource\Pages;

use App\Filament\Resources\KategoriMobilResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriMobils extends ListRecords
{
    protected static string $resource = KategoriMobilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
