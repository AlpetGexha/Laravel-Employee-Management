<?php

namespace Database\Factories;

use App\Models\Attendances;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendancesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendances::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'checked_in_at' => $this->faker->dateTime(),
            'checked_out_at' => $this->faker->dateTime(),
            'late' => $this->faker->dateTime(),
            'overtime' => $this->faker->dateTime(),
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
        ];
    }
}
