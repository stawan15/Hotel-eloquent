<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'check_in_date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'check_out_date' => $this->faker->dateTimeBetween('now', '+1 years'),
            'total_price' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}
