<?php

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
        $this->call(CreateDefaultUsersSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(DefaultRoleSeeder::class);
        $this->call(AssignDefaultRoleToPermissionSeeder::class);
    }
}
