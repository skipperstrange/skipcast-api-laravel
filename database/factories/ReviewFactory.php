<?php

use Faker\Generator as Faker;
use SkipCast\Model\Channel;

$factory->define(SkipCast\Model\Review::class, function (Faker $faker) {
    return [
        'channel_id' =>function(){return Channel::all()->random();},
        'user_id' => $faker->numberBetween(0,5),
        'review' => $faker->paragraph
    ];
});
