<?php

namespace App\Filament\Widgets;

use App\Models\Departament;
use App\Models\Employee;
use Filament\Widgets\BarChartWidget;

class EmployeeDepartamentChart extends BarChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $employee = Employee::selectRaw('count(*) as count, departament_id',)
            ->groupBy('departament_id')
            ->get('count', 'departament_id');
        // dd($employee);
        return [
            'datasets' => [
                [
                    'label' => 'Employ For Departament',
                    'data' => $employee->map(fn ($value) => $value->count),
                ],
            ],
            'labels' => $employee->map(fn ($value) => Departament::find($value->departament_id)->name),
        ];
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
}
