<?php

namespace App\Filament\Resources\StatesResource\Pages;

use App\Filament\Resources\StatesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStates extends EditRecord
{
    protected static string $resource = StatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
