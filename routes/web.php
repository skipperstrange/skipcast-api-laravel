<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();
Route::get('/home', 'HomeController@home')->name('home');

//channels
Route::get('/channels', 'ChannelController@index')->name('channels');
Route::get('/channels/edit', 'ChannelController@edit')->name( 'channel.edit');
Route::get('/channels/delete/{channel_id}', 'ChannelController@delete')->name( 'channel.delete')->middleware('auth');
//Route::get( '/channels/edit/{channel}', 'ChannelController@edit')->name( 'channel.edit');
Route::get( '/channels/editmodal/{channel}', 'ModalController@editchannel')->name( 'modal.channel.edit');
Route::post('/channels/save', 'ChannelController@save')->name('channel.save');

//media
Route::get('/media', 'MediaController@index')->name('media');
Route::get('/media/add', 'MediaController@add')->name('media.add');
Route::get('/media/edit', 'MediaController@edit')->name('media.edit');
Route::post('/media/save', 'MediaController@save')->name('media.save');

Route::get('logout', 'Auth\LoginController@logout');
