<?php

namespace SkipCast\Model;
use SkipCast\Model\Channel;
use SkipCast\Model\Genre;
use SkipCast\User;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    function user(){
        return $this->belongsTo(User::class);
    }

    function channels(){
         return $this->belongsToMany(Channel::class, 'channel_media', 'media_id');
    }

    function genres(){
         return $this->hasMany(Genre::class, 'media_genres', 'media_id');
    }
}
