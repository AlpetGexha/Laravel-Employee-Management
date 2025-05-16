<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Resources\Pages\ViewRecord;

class ViewProject extends ViewRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\ActionGroup::make([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ]),
        ];
    }
}
