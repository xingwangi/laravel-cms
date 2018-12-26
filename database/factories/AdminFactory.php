<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'nickname' => $faker->name,
        'password' => bcrypt('admin888'), // secret
        'remember_token' => str_random(10),
    ];
});
