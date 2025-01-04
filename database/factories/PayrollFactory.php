<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Payroll;
use App\Models\SalaryStructures;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payroll>
 */
class PayrollFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payroll::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'deduction' => fake()->randomFloat(2, 0, 999999.99),
            'total_payable' => fake()->randomFloat(2, 0, 999999.99),
            'reason' => fake()->word(),
            'year' => fake()->year(),
            'month' => fake()->month(),
            'date' => fake()->dateTime(),
            //            'emopl' => User::factory(),
            'salary_structures_id' => SalaryStructures::factory(),
            'company_id' => Company::factory(),
        ];
    }
}
