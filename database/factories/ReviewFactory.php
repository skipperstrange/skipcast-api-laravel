<?php

use Faker\Generator as Faker;
use App\Model\Channel;

$factory->define(App\Model\Review::class, function (Faker $faker) {
    return [
        'channel_id' =>function(){return Channel::all()->random();},
        'user_id' => $faker->numberBetween(0,5),
        'review' => $faker->paragraph
    ];
});
