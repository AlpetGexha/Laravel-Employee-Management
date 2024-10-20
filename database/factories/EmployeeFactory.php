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
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'personal_number' => $this->faker->word(),
            'address' => $this->faker->word(),
            'date_birth' => $this->faker->dateTime(),
            'date_hired' => $this->faker->dateTime(),
            'date_fired' => $this->faker->dateTime(),
            'is_active' => $this->faker->boolean(),
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
