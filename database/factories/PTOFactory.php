<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\PTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PTOFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PTO::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'from_date' => $this->faker->dateTime(),
            'to_date' => $this->faker->dateTime(),
            'days' => $this->faker->word(),
            'leave_type' => $this->faker->word(),
            'reason' => $this->faker->word(),
            'is_approved' => $this->faker->boolean(),
            'company_id' => Company::factory(),
            'user_id' => User::factory(),
        ];
    }
}
