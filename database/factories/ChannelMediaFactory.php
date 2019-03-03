<?php

use Faker\Generator as Faker;
use App\Model\Media;
use App\Model\Channel;

$factory->define(App\Model\ChannelMedia::class, function (Faker $faker) {
    return [
        'channel_id' =>function(){return   Channel::all()->random();},
        'media_id' =>function(){return   Media::all()->random();}
          ];
});
