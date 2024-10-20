<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Countries;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'country_code' => $this->faker->word(),
            'name' => $this->faker->name(),
            'company_id' => Company::factory(),
        ];
    }
}
