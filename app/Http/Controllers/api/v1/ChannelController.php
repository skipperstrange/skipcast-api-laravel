<?php

namespace SkipCast\Http\Controllers\api\v1;

use SkipCast\Model\Channel;
use Illuminate\Http\Request;
use SkipCast\Http\Controllers\Controller;
use SkipCast\Http\Requests\ChannelRequest;
use SkipCast\Http\Resources\Channel\ChannelResource;
use SkipCast\Http\Resources\Channel\ChannelCollection;

class ChannelController extends Controller
{

    function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ChannelCollection::collection(Channel::Paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChannelRequest $request)
    {
        $channel = new Channel;
        $channel->name =$request->name;
        $channel->description =$request->description;
        $channel->privacy = $request->privacy;
        $channel->state = $request->state;
        return $channel;
    }

    /**
     * Display the specified resource.
     *
     * @param  \SkipCast\Model\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        return new ChannelResource($channel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SkipCast\Model\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SkipCast\Model\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SkipCast\Model\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        //
    }
}
