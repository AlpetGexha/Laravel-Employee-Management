<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Employee;
use App\Models\PTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PTO>
 */
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
            'from_date' => fake()->dateTime(),
            'to_date' => fake()->dateTime(),
//            'days' => $this->faker->word(),
            'leave_type' => fake()->randomElement(\App\Enums\LeaveType::toArray()),
            'reason' => fake()->sentence(),
            'is_approved' => fake()->boolean(),
            'company_id' => Company::factory(),
          ];
    }
}
