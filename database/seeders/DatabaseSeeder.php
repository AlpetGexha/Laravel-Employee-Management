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

        $this->withProgressBar(3, fn () => Countries::factory()->create());

        $this->command->info('Seedin Cities');
        $this->withProgressBar(2, fn () => Cities::factory()
            ->for(
                States::factory()
                    ->for(Countries::factory())
            )
            ->count(random_int(1, 4))
            ->create());

        $this->command->info('Employee');
        $this->withProgressBar(3, fn () => Employee::factory()
            ->for(Countries::factory())
            ->for(States::factory()
                ->for(Countries::factory()))
            ->for(Cities::factory()
                ->for(
                    States::factory()
                        ->for(Countries::factory())))
            ->for(Departments::factory())
            ->for(SalaryStructures::factory())
            ->has(Payroll::factory()->count(random_int(1, 3)))
            ->create());

        $this->command->info('RFID');
        $this->withProgressBar(3, fn () => RFID::factory()
            ->state(fn (array $attributes): array => ['employee_id' => Employee::inRandomOrder()->first()->id])
            ->create());

        $this->command->info('Projects');
        $this->withProgressBar(3, fn () => Project::factory()
            ->has(Task::factory()->count(random_int(10, 30)))
            ->create());

        //        $employee = $this->withProgressBar(10, function () {
        //            return Employee::factory()
        //                ->for()
        //                ->count(10)
        //                ->create();
        //        });

    }

    protected function withProgressBar(int $amount, Closure $createCollectionOfOne): Collection
    {SSS
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
