<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    protected $model = Sale::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'customer_id' => Customer::factory(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'total_price' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
