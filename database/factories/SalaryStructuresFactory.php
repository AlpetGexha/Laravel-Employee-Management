<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\SalaryStructures;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalaryStructures>
 */
class SalaryStructuresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalaryStructures::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'salary_class' => fake()->word(),
            'basic_salary' => fake()->randomFloat(2, 0, 999999.99),
            'mobile_allowance' => fake()->word(),
            'medical_expenses' => fake()->word(),
            'houseRent_allowance' => fake()->word(),
            'total_salary' => fake()->randomFloat(2, 0, 999999.99),
            'company_id' => Company::factory(),
        ];
    }
}
