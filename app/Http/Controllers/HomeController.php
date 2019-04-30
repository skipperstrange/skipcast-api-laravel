<?php

namespace SkipCast\Http\Controllers;

use Illuminate\Http\Request;

use SkipCast\Http\Controllers;
use SkipCast\Model\Channel;
use SkipCast\Http\Controllers\Controller;
use SkipCast\Http\Requests\ChannelRequest;
use SkipCast\Http\Resources\Channel\ChannelResource;
use SkipCast\Http\Resources\Channel\ChannelCollection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('auth:web')->except('index');
    }



    public function index(){
        $channels = ChannelCollection::collection(Channel::orderBy('views', 'desc')
                    ->orderBy('likes', 'desc')
                    ->orderBy('created_at', 'desc')
            ->Paginate(20));
        return view('welcome', ['channels'=>$channels]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }
}
