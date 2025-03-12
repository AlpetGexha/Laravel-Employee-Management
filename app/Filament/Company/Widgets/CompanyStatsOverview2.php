<?php

namespace App\Filament\Company\Widgets;

use App\Models\Company;
use App\Models\User;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CompanyStatsOverview2 extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Companies', Company::count())
                ->description('Total number of companies')
                ->color('primary'),

            Card::make('Total Users', User::count())
                ->description('Total number of users')
                ->color('success'),

            Card::make('Total Employees', Employee::count())
                ->description('Total number of employees')
                ->color('info'),
        ];
    }
}
