<?php

namespace SkipCast\Model;

use SkipCast\Model\Channel;
use SkipCast\Model\Media;
use SkipCast\Model\Review;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    function channel(){

         return $this->hasMany(Channel::class);
    }

    function media(){

        return $this->hasMany(Media::class);
    }

    function review(){
        return $this->hasMany(Review::class);
    }
}
