<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Merchant;
use App\Models\Treat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        \App\Models\User::factory()->createOne([
            'name' => 'admin',
            'username' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        Merchant::factory(30)->create();

        Merchant::all()->each(function ($merchant) {
            Treat::factory(30)->create([
                'merchant_id' => $merchant->id
            ]);
        });
    }
}
