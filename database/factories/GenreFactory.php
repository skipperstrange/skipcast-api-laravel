<?php

use Faker\Generator as Faker;

$factory->define(SkipCast\Model\Genre::class, function (Faker $faker) {
    return [
        'genre' => $faker->word
    ];
});
