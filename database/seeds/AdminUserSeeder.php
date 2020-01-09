<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            'name'  => 'Ladumor',
            'email'      => 'sml@gmail.com',
            'password'   => Hash::make('123456'),
        ];

        $user = User::create($input);
    }
}
