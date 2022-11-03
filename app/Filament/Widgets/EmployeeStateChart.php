<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use App\Models\State;
use Filament\Widgets\BarChartWidget;

class EmployeeStateChart extends BarChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $employee = Employee::selectRaw('count(*) as count, state_id')
            ->groupBy('state_id')
            ->get('count', 'state_id');
        return [
            'datasets' => [
                [
                    'label' => 'Employ For State',
                    'data' => $employee->map(fn ($value) => $value->count),
                ],
            ],
            'labels' => $employee->map(fn ($value) => State::find($value->state_id)->name),
        ];
    }
}
