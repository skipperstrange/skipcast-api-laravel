<?php

namespace App\Model;

use App\Model\Review;
use App\Model\Media;
use App\Model\Genre;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    function user(){
        return $this->belongsTo(User::class);
    }

    function reviews(){
         return $this->hasMany(Review::class);
    }

    function media(){
        return $this->belongsToMany(Media::class, 'channel_media', 'channel_id');
    }

    function genre(){
        return $this->hasMany(Genre::class, 'channel_genres', 'genre_id');
    }
}
