<?php

namespace App\Filament\Company\Widgets;

use App\Models\Company;
use App\Models\User;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Project;
use App\Models\PTO;
use App\Models\Task;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CompanyStatsOverview3 extends BaseWidget
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

            Card::make('Total Paychecks', Payroll::count())
                ->description('Total number of paychecks issued')
                ->color('warning'),

            Card::make('PTO This Month', PTO::whereMonth('date', now()->month)->count())
                ->description('PTO requests for this month')
                ->color('danger'),

            Card::make('PTO Next Month', PTO::whereMonth('date', now()->addMonth()->month)->count())
                ->description('PTO requests for next month')
                ->color('secondary'),

            Card::make('Projects', Project::count())
                ->description('Total number of projects')
                ->color('primary'),

            Card::make('Tasks', Task::count())
                ->description('Total number of tasks')
                ->color('success'),
        ];
    }
}
