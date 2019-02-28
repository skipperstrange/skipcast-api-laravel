<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Review::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(0,5),
        'review' => $faker->paragraph
    ];
});
