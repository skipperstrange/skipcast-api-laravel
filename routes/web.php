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
Route::get('/channels/edit', 'ChannelController@edit')->name( 'editchannel');
Route::get('/channels/delete/{channel_id}', 'ChannelController@delete')->name( 'deletechannel')->middleware('auth');
//Route::get( '/channels/edit/{channel}', 'ChannelController@edit')->name( 'editchannel');
Route::get( '/channels/editmodal/{channel}', 'ModalController@editchannel')->name( 'editchannelmodal');
Route::post('/channels/save', 'ChannelController@save')->name('savechannel');

//media
Route::get('/media/edit', 'MediaController@edit')->name('editmedia');

Route::get('logout', 'Auth\LoginController@logout');
