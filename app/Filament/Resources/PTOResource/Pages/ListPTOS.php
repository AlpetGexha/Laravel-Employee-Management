<?php

namespace App\Filament\Resources\PTOResource\Pages;

use App\Filament\Resources\PTOResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPTOS extends ListRecords
{
    protected static string $resource = PTOResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
