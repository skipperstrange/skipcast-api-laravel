<?php

namespace SkipCast\Model;

use SkipCast\Model\Channel;
//use SkipCast\Model\User;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    function channel(){
         return $this->belongsTo(Channel::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
