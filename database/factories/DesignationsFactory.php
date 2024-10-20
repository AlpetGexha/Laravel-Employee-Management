<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Designations;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesignationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Designations::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'company_id' => Company::factory(),
        ];
    }
}
