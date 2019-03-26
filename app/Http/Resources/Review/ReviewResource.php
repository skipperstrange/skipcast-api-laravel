<?php

namespace SkipCast\Http\Resources\Review;

use Illuminate\Http\Resources\Json\JsonResource;

class ChannelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
    return [
            'id' => $this->id,
            //'user' => $this->user_id,
            'comment' => $this->review,
            'href' => [
                'channel' => route('channwl.show', $this->channel_id),
                'user'=> $this->user_id > 0 ? route('user.show', $this->user_id) : 'Ananymous'
            ]
        ];

    }
}
