<?php

use Faker\Generator as Faker;
use SkipCast\Model\Media;
use SkipCast\Model\Genre;

$factory->define(SkipCast\Model\MediaGenre::class, function (Faker $faker) {
    return [
        'genre_id' =>function(){return   Genre::all()->random();},
        'media_id' =>function(){return   Media::all()->random();}
    ];
});
