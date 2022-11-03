<?php

namespace App\Filament\Widgets;

use App\Models\City;
use App\Models\Country;
use App\Models\Departament;
use App\Models\Employee;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class WebStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getCards(): array
    {
        $employee = Employee::count();
        $city = City::count();
        $departament = Departament::count();
        $state = State::count();
        $country = Country::count();
        $user = User::count();

        return [
            Card::make('Employees', $employee)
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Card::make('Departaments', $departament),
            Card::make('Citys', $city),
            Card::make('States', $state),
            Card::make('Countrys', $country),
            Card::make('Users', $user),
        ];
    }
}
