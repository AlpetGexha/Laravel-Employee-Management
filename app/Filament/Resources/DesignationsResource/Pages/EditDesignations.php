<?php

namespace App\Filament\Resources\DesignationsResource\Pages;

use App\Filament\Resources\DesignationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDesignations extends EditRecord
{
    protected static string $resource = DesignationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
