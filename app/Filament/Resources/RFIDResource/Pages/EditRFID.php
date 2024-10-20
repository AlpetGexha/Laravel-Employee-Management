<?php

namespace App\Filament\Resources\RFIDResource\Pages;

use App\Filament\Resources\RFIDResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRFID extends EditRecord
{
    protected static string $resource = RFIDResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
