<?php

use Faker\Generator as Faker;
use App\Model\Media;
use App\Model\Genre;

$factory->define(App\Model\MediaGenre::class, function (Faker $faker) {
    return [
        'genre_id' =>function(){return   Genre::all()->random();},
        'media_id' =>function(){return   Media::all()->random();}
    ];
});
