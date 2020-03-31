<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name'         => 'manage_users',
                'display_name' => 'Manage Users',
                'description'  => 'User tab visible',
            ],
            [
                'name'         => 'manage_roles',
                'display_name' => 'Manage Roles',
                'description'  => '',
            ],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
