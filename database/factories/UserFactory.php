<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    return [
        'name'              => $faker->word,
        'email'             => $faker->word,
        'email_verified_at' => $faker->word,
        'password'          => $faker->word,
        'image_path'        => $faker->word,
        'created_at'        => $faker->date('Y-m-d H:i:s'),
        'updated_at'        => $faker->date('Y-m-d H:i:s'),
    ];
});
