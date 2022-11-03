<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Widgets\PieChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;


class WebStatsChart extends PieChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?string $maxHeight = '300px';
    protected static ?int $sort = 4;


    protected function getHeading(): string
    {
        return 'Employee Hired for Year';
    }

    protected function getData(): array
    {

        $employee = Employee::selectRaw('count(*) as count, year(date_hired) as year')
            ->groupBy('year')
            ->get('count', 'year');

        return [
            'datasets' => [
                [
                    'label' => 'Employee Hired for Year',
                    'data' => $employee->map(fn ($value) => $value->count),
                ],
            ],
            'labels' => $employee->map(fn ($value) => $value->year),
        ];
    }
}
