<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Media::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(0,5),
        'type' => $faker->randomElement(['audio', 'video']),
        'title' => $faker->word,
        'author' => $faker->word,
        'downloadable' => $faker->randomElement(['yes', 'no']),
        'user_id' => $faker->numberBetween(0,5),

    ];
});
