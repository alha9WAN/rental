<?php

namespace App\Filament\Resources\KategoriVoucherResource\Pages;

use App\Filament\Resources\KategoriVoucherResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriVouchers extends ListRecords
{
    protected static string $resource = KategoriVoucherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
