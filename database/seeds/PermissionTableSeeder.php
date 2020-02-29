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
        $input =
            [
                'name'         => 'manage_users',
                'display_name' => 'Manage Users',
                'description'  => 'User tab visible',
            ];
        /** @var Permission $permission */
        Permission::create($input);
    }
}
