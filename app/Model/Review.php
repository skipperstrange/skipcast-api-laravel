<?php

namespace App\Model;

use App\Model\Channel;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    function channel(){
        return $this->belongsTo(Channel::class);
    }
}
