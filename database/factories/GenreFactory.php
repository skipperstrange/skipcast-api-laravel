<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Genre::class, function (Faker $faker) {
    return [
        'genre' => $faker->word
    ];
});
