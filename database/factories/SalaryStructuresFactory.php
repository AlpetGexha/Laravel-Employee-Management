<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\SalaryStructures;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'salary_class' => $this->faker->word(),
            'basic_salary' => $this->faker->randomFloat(2, 0, 999999.99),
            'mobile_allowance' => $this->faker->word(),
            'medical_expenses' => $this->faker->word(),
            'houseRent_allowance' => $this->faker->word(),
            'total_salary' => $this->faker->randomFloat(2, 0, 999999.99),
            'company_id' => Company::factory(),
        ];
    }
}
