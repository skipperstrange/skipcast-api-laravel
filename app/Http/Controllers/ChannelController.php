<?php

namespace SkipCast\Http\Controllers;

use Illuminate\Http\Request;
use SkipCast\Http\Controllers;
use SkipCast\Http\Requests\ChannelRequest;
use SkipCast\Http\Resources\Channel\ChannelResource;
use SkipCast\Http\Resources\Channel\ChannelCollection;

class ChannelController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:web')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$channels =  ChannelCollection::collection(Channel::Paginate(20));
        return view('channels');
       // return
    }

    public function add(){
        return view('newchannel');
    }

}
