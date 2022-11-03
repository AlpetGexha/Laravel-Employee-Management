<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'country_id' => $this->faker->numberBetween(1, 9),
            'departament_id' => $this->faker->numberBetween(1, 9),
            'city_id' => $this->faker->numberBetween(1, 9),
            'state_id' => $this->faker->numberBetween(1, 9),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'address' => $this->faker->address,
            'zip_code' => $this->faker->countryCode,
            'date_birth' => $this->faker->dateTimeBetween('-30 years', '-20 years'),
            'date_hired' => $this->faker->dateTimeBetween('-3 years', '-2 years'),
        ];
    }
}
