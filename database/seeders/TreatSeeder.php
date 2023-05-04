<?php

namespace Database\Seeders;

use App\Models\Treat;
use App\Models\Merchant;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TreatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchants = Merchant::all();

        $faker = \Faker\Factory::create();

        foreach ($merchants as $merchant) {
            for ($i = 0; $i < 100; $i++) {
                Treat::create([
                    'merchant_id' => $merchant->id,
                    'car_name' => $faker->word,
                    'shasi_number' => $faker->unique()->randomNumber(8),
                    'color' => $faker->safeColorName,
                    'model' => $faker->numberBetween(2000, 2023),
                    'border' => $faker->countryCode,
                    'transport_price' => $faker->unique()->randomFloat(2, 1, 1000),
                    'coc_price' => $faker->unique()->randomFloat(2, 1, 1000),
                    'custom_price' => $faker->unique()->randomFloat(2, 1, 1000),
                    'balance_price' => $faker->unique()->randomFloat(2, 1, 1000),
                    'total_price' => $faker->unique()->randomFloat(2, 1, 10000),
                    'recive_price' => $faker->unique()->randomFloat(2, 1, 5000),
                    'amount_price' => $faker->unique()->randomFloat(2, 1, 5000),
                    'in_sh' => $faker->boolean(),
                    'inv_agr' => $faker->boolean(),
                ]);
            }
        }
    }
}
