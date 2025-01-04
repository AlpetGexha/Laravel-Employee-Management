<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Countries;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Countries>
 */
class CountriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Countries::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'country_code' => fake()->countryCode(),
            'name' => fake()->country(),
            'company_id' => Company::factory(),
        ];
    }
}
