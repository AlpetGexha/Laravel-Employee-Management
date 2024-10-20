<?php

namespace App\Filament\Resources\SalaryStructuresResource\Pages;

use App\Filament\Resources\SalaryStructuresResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalaryStructures extends ListRecords
{
    protected static string $resource = SalaryStructuresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
