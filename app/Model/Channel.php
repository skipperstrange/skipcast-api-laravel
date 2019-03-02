<?php

namespace App\Model;

use App\Model\Review;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    function reviews(){
        return $this->hasMany(Review::class);
    }
}
