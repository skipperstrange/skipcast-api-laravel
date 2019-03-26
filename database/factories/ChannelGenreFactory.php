<?php

use Faker\Generator as Faker;
use SkipCast\Model\Channel;
use SkipCast\Model\Genre;

$factory->define(SkipCast\Model\ChannelGenre::class, function (Faker $faker) {
    return [
        'genre_id' =>function(){return   Genre::all()->random();},
        'channel_id' =>function(){return   Channel::all()->random();}
         ];
});
