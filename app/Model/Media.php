<?php

namespace SkipCast\Model;
use SkipCast\Model\Channel;
use SkipCast\Model\Genre;
use SkipCast\User;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $media_info = array();
    public $getID3;
    protected $art_extensions = ['image/jpeg'=>'jpg', 'image/jpeg'=>'jpg', 'image/png' => 'png'];
    protected $media_store_path;
    protected $media_art_path;
    protected $media_store_url;
    protected $media_art_url;


    function __construct()
    {
        $this->getID3 = new \getID3;
        $this->media_store_path = Storage::disk('local')->path('') . 'public/media/';
        $this->media_art_path = Storage::disk('local')->path('') . 'public/art/';
        $this->media_store_url = Storage::disk('local')->url('') . 'public/media/';
        $this->media_art_url = Storage::disk('local')->url('') . 'public/art/';
    }


    function user(){
        return $this->belongsTo(User::class);
    }

    function channels(){
         return $this->belongsToMany(Channel::class, 'channel_media', 'media_id');
    }

    function genres(){
         return $this->hasMany(Genre::class, 'media_genres', 'media_id');
    }





    protected function _filename($name = null, $extension = null){
        return sha1(md5($name)).'.'.$extension;
    }

    protected function _get_media_info($media)
    {
        return $this->media_info = $this->getID3->analyze($media);
    }

    protected function _get_basic_info($media)
    {
        $media_info = $this->getID3->analyze($media);
        $this->media_info['title'] = @$media_info['audio']['channelmode'];
        $this->media_info['channelmode'] = @$media_info['tags']['id3v1']['title'][0];
        $this->media_info['artist'] = @$media_info['tags']['id3v1']['artist'][0];
        $this->media_info['comment'] = @$media_info['tags']['id3v1']['comment'][0];
        $this->media_info['year'] = @$media_info['tags']['id3v1']['year'];
        $this->media_info['playtime_seconds'] = @$media_info['playtime_seconds'];
        $this->media_info['media_art_mime'] = @$media_info['comments']['picture'][0]['image_mime'];
        //$this->media_info['media_art'] = @$media_info['comments']['picture'][0]['data'];
        $this->media_info['media_art'] = 'data:' . $this->media_info['media_art_mime'] . ';base64,' . $this->_album_art($media);
        $this->media_info['media_art_raw'] = $this->_album_art($media);
        return $this->media_info;
    }

    protected function _album_art($media)
    {
        $m = $this->getID3->analyze($media);
        if(isset( $m['comments']['picture'][0]['data'])){
            $data = @$m['comments']['picture'][0]['data'];
            return base64_encode($data);
        }
        return asset( 'images/defaults/music_2.jpg');
    }

    protected function _set_media_info($id3_array = array()){
        return $this->media_info = $id3_array;
    }

    protected function _store_media($filename, $source)
    {
        return Storage::disk('media')->put($filename, $source);
    }

    protected function _store_media_art($filename, $source)
    {
        return file_put_contents($this->media_art_path. $filename, file_get_contents($source));
    }

    protected function _art_extension($mime_type){
      //  return  str_replace(array('image/', 'x-', 'jpeg'), array('', '', 'jpg'), $mime_type);
       return  $this->art_extensions[$mime_type];
    }

}
