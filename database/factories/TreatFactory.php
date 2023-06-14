<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Treat>
 */
class TreatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merchant_id' => null,
            'car_name' => fake()->word(),
            'car_number' => fake()->unique()->numberBetween(1, 1000, 1000),
            'shasi_number' => fake()->unique()->randomNumber(8),
            'color' => fake()->safeColorName(),
            'model' => fake()->numberBetween(2000, 2023),
            'border' => fake()->countryCode(),
            'transport_price' => fake()->unique()->randomFloat(2, 1, 1000),
            'coc_price' => fake()->unique()->randomFloat(2, 1, 1000),
            'custom_price' => fake()->unique()->randomFloat(2, 1, 1000),
            'balance_price' => fake()->unique()->randomFloat(2, 1, 1000),
            'total_price' => fake()->unique()->randomFloat(2, 1, 10000),
            'recive_price' => fake()->unique()->randomFloat(2, 1, 5000),
            'amount_price' => fake()->unique()->randomFloat(2, 1, 5000),
            'in_sh' => fake()->boolean(),
            'inv_agr' => fake()->boolean(),
            //
        ];
    }
}
