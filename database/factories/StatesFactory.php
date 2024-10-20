<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Countries;
use App\Models\States;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = States::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'state_code' => $this->faker->word(),
            'name' => $this->faker->name(),
            //            'countries_id' => Countries::factory(),
            'company_id' => Company::factory(),
        ];
    }
}
