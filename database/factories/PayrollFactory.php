<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Payroll;
use App\Models\SalaryStructures;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'deduction' => $this->faker->randomFloat(2, 0, 999999.99),
            'total_payable' => $this->faker->randomFloat(2, 0, 999999.99),
            'reason' => $this->faker->word(),
            'year' => $this->faker->word(),
            'month' => $this->faker->word(),
            'date' => $this->faker->dateTime(),
            //            'emopl' => User::factory(),
            'salary_structuresb _id' => SalaryStructures::factory(),
            'company_id' => Company::factory(),
        ];
    }
}
