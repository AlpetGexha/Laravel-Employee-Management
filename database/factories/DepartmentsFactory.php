<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Departments;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Departments::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'department_code' => $this->faker->word(),
            'company_id' => Company::factory(),
        ];
    }
}
