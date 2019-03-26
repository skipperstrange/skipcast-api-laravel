<?php

namespace SkipCast\Model;

use SkipCast\Model\Media;
use SkipCast\Model\Channel;


use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    function channels(){
         return $this->hasMany(Channel::class);
    }

    function media(){
        return $this->belongsToMany(Media::class, 'media_genres');
    }
}
