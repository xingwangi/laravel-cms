<?php

use Faker\Generator as Faker;


/**
 *  模型工厂批量填充
 */
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,

        'password' => bcrypt('admin888'), // secret
        'remember_token' => str_random(10),
    ];
});
