<?php

namespace SkipCast\Http\Controllers\api\v1;

use SkipCast\Model\Review;
use SkipCast\Model\Channel;
use Illuminate\Http\Request;
use SkipCast\Http\Controllers\Controller;
use SkipCast\Http\Resources\Review\ReviewResource;
use SkipCast\Http\Resources\Review\ReviewCollection;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(channel $channel)
    {
        return ReviewCollection::collection($channel->reviews);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \SkipCast\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return new ReviewResource($review);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SkipCast\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SkipCast\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SkipCast\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
