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

use App\Postcard;
use App\PostCardSendingService;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pay', 'PayOrderController@store');
Route::get('/channels', 'ChannelController@index');
Route::get('/post', 'PostController@create');


Route::get('/postcard', function () {
    $Postcard =  new PostCardSendingService('us', 80, 180);
    $Postcard->hello('hello from me', 'test@test.com');
});

Route::get('/facades', function () {
    Postcard::hello('hello from me', 'test@test.com');
});

Route::get('/macro', function(){
   // dump(Str::partNumber(123456789));
    dump(Str::prefixNumber(111111));
});
