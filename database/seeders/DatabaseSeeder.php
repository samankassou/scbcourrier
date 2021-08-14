<?php

namespace Database\Seeders;

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
        $this->call([
            RolesAndAbilitiesSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            CourierSeeder::class,
        ]);
    }
}
