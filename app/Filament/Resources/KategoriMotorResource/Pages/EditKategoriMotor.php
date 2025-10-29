<?php

namespace App\Filament\Resources\KategoriMotorResource\Pages;

use App\Filament\Resources\KategoriMotorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriMotor extends EditRecord
{
    protected static string $resource = KategoriMotorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
