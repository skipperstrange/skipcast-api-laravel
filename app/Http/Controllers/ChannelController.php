<?php

namespace SkipCast\Http\Controllers;

use Illuminate\Http\Request;
use SkipCast\Http\Controllers;
use SkipCast\Http\Requests\ChannelRequest;
use SkipCast\Http\Resources\Channel\ChannelResource;
use SkipCast\Http\Resources\Channel\ChannelCollection;
use SkipCast\Model\Channel;
use Illuminate\Support\Facades\Auth;
class ChannelController extends Controller
{

    protected $rules = [
        'name' => "required|max:30"
    ];

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

    public function edit(){

        $channel = new Channel;
        return view('editchannel', ['channel'=>$channel]);
    }

    public function save(Request $request){

        $validate = \Validator::make($request->all(), $this->rules);

        if ($validate->fails()) {
            $notice['message'] = $validate->messages();
            $notice['class'] = "alert-danger";
            $notice['status'] = "fail";
            return response()->json($notice, 200);
        }

        if(isset($request['channel_id'])){
            $channel = Channel::find($request['channel_id']);
            $channel->name = $request['name'];
            $channel->description = $request['description'];
            $channel->privacy = $request['privacy'];
            $channel->update();
            $notice[ 'message'] = "Channel successfully updated.";
            $notice['class'] = "alert-success";
        }else{
            $channel = new Channel();
            $channel->name = $request['name'];
            $channel->description = $request['description'];
            $channel->privacy = $request['privacy'];
            $notice['msg'] = "Please check the errors.";
            $notice['class'] = 'alert-danger';
            if ($request->user()->channel()->save($channel)) {
                $notice[ 'message'] = "Channel successfully created.";
                $notice['class'] = "alert-success";
            }
        }
        if ($request->ajax()) {
          // return $request['channel_id'];
           return response()->json($notice, 200);
        }else{
            return rediect('newchannel')->with($notice);
        }
    }

    public function delete($channel_id){

        $channel = Channel::where('id', $channel_id)->first();

        if (Auth::user() != $channel->user) {
            return redirect()->back();
        }

        $notice['msg'] = "Action could not be completed.";
            $notice['class'] = "alert-danger";
            $notice['notice_type'] = 'modal';
             return redirect()->back()->with($notice);

        if($channel){
            $channel->delete();
            $notice['msg'] = "Your channel '$channel->name' successfully removed.";
            $notice['class'] = "alert-success";
            $notice['notice_type'] = 'modal';
            return redirect()->route('home')->with($notice);
        }
        $notice['msg'] = "Channel does not exist.";
        $notice['class'] = "alert-danger";
        $notice['notice_type'] = 'modal';

        return redirect('newchannel')->route('index')->with($notice);
    }

}
