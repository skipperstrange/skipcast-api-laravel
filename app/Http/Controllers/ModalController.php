<?php

namespace SkipCast\Http\Controllers;

use Illuminate\Http\Request;

use SkipCast\Http\Controllers;
use SkipCast\Model\Channel;
use SkipCast\Http\Controllers\Controller;
use SkipCast\Http\Requests\ChannelRequest;
use SkipCast\Http\Resources\Channel\ChannelResource;
use SkipCast\Http\Resources\Channel\ChannelCollection;

class ModalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth:web')->except('index');
    }

    public function editchannel(int $channel_id)
    {
        if ($channel_id) {
            $channel = Channel::find($channel_id);
        } else {
            $channel = new Channel;
        }

        return view('modals/edit-channel', ['channel' => $channel]);
    }
}
