<?php

namespace App\Filament\Resources\SalaryStructuresResource\Pages;

use App\Filament\Resources\SalaryStructuresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSalaryStructures extends EditRecord
{
    protected static string $resource = SalaryStructuresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
