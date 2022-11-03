<?php

namespace App\Filament\Resources\DepartamentResource\Pages;

use App\Filament\Resources\DepartamentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDepartament extends EditRecord
{
    protected static string $resource = DepartamentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
