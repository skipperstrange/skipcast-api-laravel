<?php

namespace SkipCast\Http\Resources\Channel;

use Illuminate\Http\Resources\Json\Resource;

class ChannelCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'privacy' => $this->privacy,
            //'active' => $this->active,
            'status' => $this->state,
            'href' => [
                'link' => route('channel.show', $this->id),
                'user'=> $this->user_id  > 0?route('user.show' , $this->user_id) : 'Ananymous'
            ]
        ];
    }
}
