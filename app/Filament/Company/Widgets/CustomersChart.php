<?php

namespace App\Filament\Company\Widgets;

use App\Models\Customer;
use Carbon\Carbon;
use Filament\Widgets\BarChartWidget;

class CustomersChart extends BarChartWidget
{
    protected static ?string $heading = 'Customers';

    protected function getData(): array
    {
        $customers = Customer::selectRaw('strftime("%Y-%m", created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        $months = [];
        $counts = [];
        $currentMonth = Carbon::now()->startOfYear();
        $endMonth = Carbon::now()->endOfYear();

        while ($currentMonth->lessThanOrEqualTo($endMonth)) {
            $month = $currentMonth->format('Y-m');
            $months[] = $month;
            $counts[] = $currentMonth->year > Carbon::now()->year ? null : ($customers->get($month)->count ?? 0);
            $currentMonth->addMonth();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Customers',
                    'data' => $counts,
                ],
            ],
            'labels' => $months,
        ];
    }
}
