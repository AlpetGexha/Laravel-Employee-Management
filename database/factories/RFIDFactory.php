<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\RFID;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RFIDFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RFID::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->word(),
            //            'user_id' => User::factory(),
            'company_id' => Company::factory(),
        ];
    }
}
