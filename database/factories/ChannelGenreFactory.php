<?php

use Faker\Generator as Faker;
use App\Model\Channel;
use App\Model\Genre;

$factory->define(App\Model\ChannelGenre::class, function (Faker $faker) {
    return [
        'genre_id' =>function(){return   Genre::all()->random();},
        'channel_id' =>function(){return   Channel::all()->random();}
         ];
});
