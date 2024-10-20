<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Countries;
use App\Models\Departments;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Project;
use App\Models\RFID;
use App\Models\SalaryStructures;
use App\Models\States;
use App\Models\Task;
use App\Models\User;
use Closure;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Symfony\Component\Console\Helper\ProgressBar;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->withPersonalCompany()->create();

        $admin = User::factory()->withPersonalCompany()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        $admin->update([
            'current_company_id' => 1,
        ]);

        $this->command->info('Seedin Contries');

        $ez = $this->withProgressBar(20, function () {
            return Countries::factory()->create();
        });

        $this->command->info('Seedin Cities');
        $countries = $this->withProgressBar(10, function () {
            return Cities::factory()
                ->for(
                    States::factory()
                        ->for(Countries::factory())
                )
                ->count(rand(1, 10))
                ->create();
        });

        $this->command->info('Employee');
        $employees = $this->withProgressBar(100, function () {
            return Employee::factory()
                ->for(Countries::factory())
                ->for(States::factory()
                    ->for(Countries::factory()))
                ->for(Cities::factory()
                    ->for(
                        States::factory()
                            ->for(Countries::factory())))
                ->for(Departments::factory())
                ->for(SalaryStructures::factory())
                ->has(Payroll::factory()->count(rand(1, 5)))
                ->create();
        });

        $this->command->info('RFID');
        $rfid = $this->withProgressBar(10, function () {
            return RFID::factory()
                ->state(function (array $attributes) {
                    return ['employee_id' => Employee::inRandomOrder()->first()->id];
                })
                ->create();
        });

        $this->command->info('Projects');
        $projects = $this->withProgressBar(10, function () {
            return Project::factory()
                ->has(Task::factory()->count(rand(20, 60)))
                ->create();
        });

        //        $employee = $this->withProgressBar(10, function () {
        //            return Employee::factory()
        //                ->for()
        //                ->count(10)
        //                ->create();
        //        });

    }

    protected function withProgressBar(int $amount, Closure $createCollectionOfOne): Collection
    {
        $progressBar = new ProgressBar($this->command->getOutput(), $amount);

        $progressBar->start();

        $items = new Collection;

        foreach (range(1, $amount) as $i) {
            $items = $items->merge(
                $createCollectionOfOne()
            );
            $progressBar->advance();
        }

        $progressBar->finish();

        $this->command->getOutput()->writeln('');

        return $items;
    }
}
