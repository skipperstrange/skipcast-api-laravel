<?php

namespace SkipCast\Http\Controllers;

use Illuminate\Http\Request;
use SkipCast\Model\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
class MediaController extends Controller
{
    //

    public function index()
    {
        //$medias =  ChannelCollection::collection(Media::Paginate(20));

        return view('media');
        // return
    }

    public function add()
    {

        //$getID3 = new \getID3;
        $media = new Media;
        return view('addmedia', ['media'=>$media]);
    }

    public function save(Request $request)
    {

        // $validate = \Validator::make($request->all(), $this->rules);

        $notice['message'] = "Media successfully created.";
        $notice['class'] = "alert-success";



        //return response()->json($request, 200);;


        $m = $request->file('files');
        //dd($m);

        //$media->mime_type = $m->getMimeType();

        //        Log::stack(['single', 'daily'])->info($media);


        $media_info = Media::_get_basic_info($m);

        if($m){
            $media = new Media();
            $media->title = $m->getClientOriginalName();
            $media->type = $m->getMimeType();
            $media->size = $m->getClientSize();

            if ($request->user()->media()->save($media)) {
               $filename =  Media::_filename($media->id, $m->getClientOriginalExtension());
                $media->name = $media->title;
                Media::_store_media($filename, File::get($m));
                $cover_art = Media::_filename($media->id, Media::_art_extension($media_info['media_art_mime']));
                //Storage::disk('art')->put( $img, $media_info['media_art']);
                Media::_store_media_art($cover_art, $media_info['media_art']);
                $media->thumbnailUrl = $media_info['media_art'];

                $files[] = $media;
                //print_r('<img src="'.$media_info['media_art'].'">');
                return response()->json(['files' => $files], 200);
            }
        }


        if ($request->ajax()) {
            $notice['message'] = "Media successfully created.";
            $notice['class'] = "alert-success";
            // return $request['media_id'];
            //return response()->json($notice, 200);
        } else {
            $notice['message'] = "Media successfully created.";
            $notice['class'] = "alert-success";
            //return rediect('newmedia')->with($notice);
        }
    }

    public function delete($media_id)
    {

        $media = Media::where('id', $media_id)->first();

        if (Auth::user() != $media->user) {
            return redirect()->back();
        }

        $notice['msg'] = "Action could not be completed.";
        $notice['class'] = "alert-danger";
        $notice['notice_type'] = 'modal';
        return redirect()->back()->with($notice);

        if ($media) {
            $media->delete();
            $notice['msg'] = "Your media '$media->name' successfully removed.";
            $notice['class'] = "alert-success";
            $notice['notice_type'] = 'modal';
            return redirect()->route('home')->with($notice);
        }
        $notice['msg'] = "Media does not exist.";
        $notice['class'] = "alert-danger";
        $notice['notice_type'] = 'modal';

        //return redirect( 'editmedia')->route('index')->with($notice);
    }

}
