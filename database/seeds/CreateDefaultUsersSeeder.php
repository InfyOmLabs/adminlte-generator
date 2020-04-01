<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CreateDefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            'name'              => 'InfyOm Technologies',
            'email'             => 'admin@gmail.com',
            'password'          => Hash::make('Adm1n'),
            'email_verified_at' => Carbon::now(),
        ];

        /** @var User $user */
        User::create($input);
    }
}
