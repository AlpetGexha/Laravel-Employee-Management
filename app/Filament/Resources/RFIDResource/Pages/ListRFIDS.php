<?php

namespace App\Filament\Resources\RFIDResource\Pages;

use App\Filament\Resources\RFIDResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRFIDS extends ListRecords
{
    protected static string $resource = RFIDResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
