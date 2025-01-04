<?php

namespace Database\Factories;

use App\Models\Cities;
use App\Models\Company;
use App\Models\Countries;
use App\Models\Departments;
use App\Models\Designations;
use App\Models\Employee;
use App\Models\SalaryStructures;
use App\Models\States;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'personal_number' => fake()->word(),
            'address' => fake()->word(),
            'date_birth' => fake()->dateTime(),
            'date_hired' => fake()->dateTime(),
            'date_fired' => fake()->dateTime(),
            'is_active' => fake()->boolean(),
            'company_id' => Company::factory(),
            'countries_id' => Countries::factory(),
            'states_id' => States::factory(),
            'cities_id' => Cities::factory(),
            'departments_id' => Departments::factory(),
            'designations_id' => Designations::factory(),
            'salary_structures_id' => SalaryStructures::factory(),
        ];
    }
}
