<?php

namespace App\Filament\Company\Widgets;

use App\Models\Sale;
use Filament\Widgets\LineChartWidget;

class SalesChart extends LineChartWidget
{
    protected static ?string $heading = 'Sales';

    protected function getData(): array
    {
        $sales = Sale::query()
            ->where('company_id', auth()->user()->current_company_id)
            ->selectRaw('DATE(created_at) as date, SUM(total_price) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Sales',
                    'data' => $sales->pluck('total')->toArray(),
                    //                    success color
                    'backgroundColor' => 'rgba(0, 255, 0, 0.1)',
                    'borderColor' => 'rgba(0, 255, 0, 1)',
                    'pointBackgroundColor' => 'rgba(0, 255, 0, 1)',
                    'pointBorderColor' => 'rgba(0, 255, 0, 1)',
                    'pointHoverBackgroundColor' => 'rgba(0, 255, 0, 1)',
                    'pointHoverBorderColor' => 'rgba(0, 255, 0, 1)',
                ],

            ],
            'labels' => $sales->pluck('date')->toArray(),
        ];
    }
}
