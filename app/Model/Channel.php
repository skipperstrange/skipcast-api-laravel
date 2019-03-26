<?php

namespace SkipCast\Model;

use SkipCast\Model\Review;
use SkipCast\Model\Media;
use SkipCast\Model\Genre;
use SkipCast\Model\User;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    function user(){
        return $this->belongsTo(User::class);
    }

    function reviews(){
         return $this->hasMany(Review::class);
    }

    function review(){

        return $this->hasMany(Review::class);
    }

    function media(){
        return $this->belongsToMany(Media::class, 'channel_media', 'channel_id');
    }

    function genre(){
        return $this->hasMany(Genre::class, 'channel_genres', 'genre_id');
    }
}
