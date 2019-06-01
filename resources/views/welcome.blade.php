@extends('layouts.app')

@section('content')
@include('includes/msgs')
            <section class="scrollable padder-lg w-f-md" id="bjax-target">
                      <h3 class="font-thin m-b">Trending Channels
                    <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
                        <span class="bar1 a1 bg-primary lter"></span>
                        <span class="bar2 a2 bg-info lt"></span>
                        <span class="bar3 a3 bg-success"></span>
                        <span class="bar4 a4 bg-warning dk"></span>
                        <span class="bar5 a5 bg-danger dker"></span>
                    </span>
                        {{--<i class="icon-disc icon text-success"></i>--}}</h3>
                     @foreach ($channels->chunk(6) as $chunk)
                      <div class="row row-sm " style="float:left;">
                        @foreach($chunk as $channel)
                        <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 col-lg-2 col-lg-offset-0">
                          <div class="item">
                            <div class="pos-rlt">
                                <div class="bottom">
                                    <span class="badge bg-info m-l-sm m-b-sm">03:20</span>
                                </div>
                              <div class="item-overlay opacity r r-2x bg-black">
                                <div class="text-info padder m-t-sm text-lg">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o text-muted"></i>
                                </div>
                                <div class="center text-center m-t-n">
                              <a href="#"><i class="icon-control-play i-3x"></i></a>
                            </div>
                            <div class="bottom padder m-b-sm">

                            @if (Auth::user() == $channel->user)
                            <a href="{{route('modal.channel.edit',['channel_id'=>$channel->id])}}" data-toggle="ajaxModal">
                          <i class="icon icon-pencil i-2x"></i>
                      </a>
                            <a href="{{route('channel.delete',['channel_id'=>$channel->id])}}" class="pull-right">
                            <i class="fa fa-trash-o i-2x"></i>
                            </a>
                            @endif

                              <a href="#" class="pull-right">
                                <i class="fa fa-heart-o i-2x"></i>
                              </a>

                              <a href="#">
                                <i class="fa fa-plus-circle i-2x"></i>
                              </a>
                            </div>
                            {{--

                                <div class="center text-center m-t-n">
                                  <a href="#"><i class="fa fa-play-circle i-2x"></i></a>
                                </div>
                               --}}
                              </div>
                              <a href="track-detail.html"><img src="images/defaults/ch_{{@rand(1, 6)}}.jpg" alt="" class="r r-2x img-full"></a>
                            </div>
                            <div class="padder-v">
                              <a href="track-detail.html" data-bjax data-target="#bjax-target" data-el="#bjax-el" data-replace="true" class="text-ellipsis">{{$channel->name}}</a>
                              <a href="track-detail.html" data-bjax data-target="#bjax-target" data-el="#bjax-el" data-replace="true" class="text-ellipsis text-xs text-muted">{{$channel->user->username}}</a>
                            </div>
                          </div>
                        </div>
                        {{--<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                            <div class="item">
                                <div class="pos-rlt">
                                <div class="bottom">
                                    <span class="badge bg-info m-l-sm m-b-sm">03:20</span>
                                </div>
                                <div class="item-overlay opacity r r-2x bg-black">
                                    <div class="text-info padder m-t-sm text-sm">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o text-muted"></i>
                                    </div>
                                    <div class="center text-center m-t-n">
                                    <a href="#"><i class="icon-control-play i-2x"></i></a>
                                    </div>
                                    <div class="bottom padder m-b-sm">
                                    <a href="#" class="pull-right">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-plus-circle"></i>
                                    </a>
                                    </div>
                                </div>
                                <a href="#"><img src="images/p1.jpg" alt="" class="r r-2x img-full"></a>
                                </div>
                                <div class="padder-v">
                                <a href="#" class="text-ellipsis">Tempered Song</a>
                                <a href="#" class="text-ellipsis text-xs text-muted">Miaow</a>
                                </div>
                            </div>
                        </div>
                        --}}
                        @endforeach
                      </div>
                      @endforeach
                   {{--   <ul class="pagination pagination">
                        <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                      </ul>

            --}}
                    </section>

@endsection()
