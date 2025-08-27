<?php

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\DegreeSeeder;
use Database\Seeders\GenderSeeder;
use Database\Seeders\ThanasSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\SessionSeeder;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\RolePermissionSeeder;

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
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            RolePermissionSeeder::class,
        ]);
    }
}
