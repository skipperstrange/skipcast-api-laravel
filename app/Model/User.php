<?php

namespace App\Model;

use App\Model\Channel;
use App\Model\Media;
use App\Model\Review;

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
