<?php

namespace Database\Factories;

use App\Models\Cities;
use App\Models\Company;
use App\Models\States;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cities>
 */
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
            'name' => fake()->city(),
            'city_code' => fake()->citySuffix(),
            'zip_code' => fake()->numberBetween(10000, 99999),
            'company_id' => Company::factory(),
        ];
    }
}
