<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product = Product::inRandomOrder()->first();
        $quantity = $this->faker->numberBetween(1, 5);
        return [
            'quantity' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->randomFloat(2, 5, 500),
        ];
    }

}
