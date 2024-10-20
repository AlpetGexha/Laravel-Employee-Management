<?php

namespace Database\Factories;

use App\Models\Cities;
use App\Models\Company;
use App\Models\States;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitiesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cities::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'city_code' => $this->faker->word(),
            'zip_code' => $this->faker->word(),
            //            'states_id' => States::factory(),
            'company_id' => Company::factory(),
        ];
    }
}
