<?php

use Faker\Generator as Faker;
use SkipCast\Model\Media;
use SkipCast\Model\Channel;

$factory->define(SkipCast\Model\ChannelMedia::class, function (Faker $faker) {
    return [
        'channel_id' =>function(){return   Channel::all()->random();},
        'media_id' =>function(){return   Media::all()->random();}
          ];
});
