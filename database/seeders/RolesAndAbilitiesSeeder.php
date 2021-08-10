<?php

namespace Database\Seeders;

use Bouncer;
use Illuminate\Database\Seeder;

class RolesAndAbilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::allow('admin')->everything();

        Bouncer::allow('register')->to([
            'view-user',
            'view-users',
        ]);
    }
}
