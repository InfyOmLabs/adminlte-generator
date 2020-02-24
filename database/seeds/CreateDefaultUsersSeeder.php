<?php

use App\Models\User;
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
            'name'              => 'Mitul Golakiya',
            'email'             => 'me@mitul.me',
            'password'          => Hash::make('1nfy0m'),
            'email_verified_at' => Carbon::now(),
        ];

        /** @var User $user */
        User::create($input);
    }
}
