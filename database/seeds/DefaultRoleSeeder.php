<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class DefaultRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            'name'         => 'Admin',
            'display_name' => 'admin',
            'description'  => 'Admin',
        ];
        /** @var Role $role */
        Role::create($input);
    }
}
