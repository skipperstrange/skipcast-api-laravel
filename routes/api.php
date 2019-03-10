<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/channel', 'api\v1\ChannelController');

Route::group(['prefix' => 'channel'], function () {
    Route::apiResource('/{channel}/review', 'api\v1\ReviewController');
});
//Route::apiResource('/user', 'api\v1\UserController');
//Route::apiResource('/user', 'api\v1\UserController');
//Route::apiResource('/review', 'api\v1\ReviewController');
//Route::apiResource('/channel/{channel}/review/', 'api\v1\ReviewController');
