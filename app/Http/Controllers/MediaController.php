<?php

namespace SkipCast\Http\Controllers;

use Illuminate\Http\Request;
use SkipCast\Http\Controllers;
use SkipCast\Http\Requests\ChannelRequest;
use SkipCast\Http\Resources\Media\ChannelResource;
use SkipCast\Http\Resources\Media\ChannelCollection;
use SkipCast\Model\Media;
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
        //$medias =  ChannelCollection::collection(Media::Paginate(20));
        return view('medias');
       // return
    }

    public function edit(){
        $media = new Media;
        return view('editmedia', ['media'=>$media]);
    }

    public function save(Request $request){

        $validate = \Validator::make($request->all(), $this->rules);

        if ($validate->fails()) {
            $notice['message'] = $validate->messages();
            $notice['class'] = "alert-danger";
            $notice['status'] = "fail";
            return response()->json($notice, 200);
        }

        if(isset($request['media_id'])){
            $media = Media::find($request['media_id']);
            $media->name = $request['name'];
            $media->description = $request['description'];
            $media->privacy = $request['privacy'];
            $media->update();
            $notice[ 'message'] = "Media successfully updated.";
            $notice['class'] = "alert-success";
        }else{
            $media = new Media();
            $media->name = $request['name'];
            $media->description = $request['description'];
            $media->privacy = $request['privacy'];
            $notice['msg'] = "Please check the errors.";
            $notice['class'] = 'alert-danger';
            if ($request->user()->media()->save($media)) {
                $notice[ 'message'] = "Media successfully created.";
                $notice['class'] = "alert-success";
            }
        }
        if ($request->ajax()) {
          // return $request['media_id'];
           return response()->json($notice, 200);
        }else{
            return rediect('newmedia')->with($notice);
        }
    }

    public function delete($media_id){

        $media = Media::where('id', $media_id)->first();

        if (Auth::user() != $media->user) {
            return redirect()->back();
        }

        $notice['msg'] = "Action could not be completed.";
            $notice['class'] = "alert-danger";
            $notice['notice_type'] = 'modal';
             return redirect()->back()->with($notice);

        if($media){
            $media->delete();
            $notice['msg'] = "Your media '$media->name' successfully removed.";
            $notice['class'] = "alert-success";
            $notice['notice_type'] = 'modal';
            return redirect()->route('home')->with($notice);
        }
        $notice['msg'] = "Media does not exist.";
        $notice['class'] = "alert-danger";
        $notice['notice_type'] = 'modal';

        return redirect('newmedia')->route('index')->with($notice);
    }

}
