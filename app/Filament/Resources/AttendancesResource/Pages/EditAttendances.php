<?php

namespace App\Filament\Resources\AttendancesResource\Pages;

use App\Filament\Resources\AttendancesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAttendances extends EditRecord
{
    protected static string $resource = AttendancesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
