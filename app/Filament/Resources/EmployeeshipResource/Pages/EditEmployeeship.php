<?php

namespace App\Filament\Resources\EmployeeshipResource\Pages;

use App\Filament\Resources\EmployeeshipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmployeeship extends EditRecord
{
    protected static string $resource = EmployeeshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
