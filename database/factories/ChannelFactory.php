<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Channel::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'user_id' => $faker->numberBetween(1,5),
        'privacy' => $faker->randomElement(['private', 'public']),
        'active' => $faker->randomElement(['active', 'inactive', 'trash'])
    ];
});
