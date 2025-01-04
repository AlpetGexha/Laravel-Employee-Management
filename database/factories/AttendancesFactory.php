<?php

namespace Database\Factories;

use App\Models\Attendances;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendances>
 */
class AttendancesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendances::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $company = Company::pluck('id')->first();

        return [
            'checked_in_at' => fake()->dateTimeBetween('-3 months'),
            'late' => fake()->dateTime(),
            'overtime' => fake()->dateTime(),
            'company_id' => $company,
        ];
    }

    public function configure(): static
    {
        $employee = Employee::pluck('id');

        return $this->afterMaking(function (Attendances $attendances) use ($employee): void {
            $attendances->employee_id = $employee->random();
            $attendances->checked_out_at = $attendances->checked_in_at->addHours(random_int(6, 12));
            $attendances->total_minutes = $attendances->checked_in_at->diffInMinutes($attendances->checked_out_at);
        });

    }
}
