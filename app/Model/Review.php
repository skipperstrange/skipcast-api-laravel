<?php

namespace App\Model;

use App\Model\Channel;
use App\Model\User;

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
