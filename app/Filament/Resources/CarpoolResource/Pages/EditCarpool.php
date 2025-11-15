<?php

namespace App\Filament\Resources\CarpoolResource\Pages;

use App\Filament\Resources\CarpoolResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarpool extends EditRecord
{
    protected static string $resource = CarpoolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
