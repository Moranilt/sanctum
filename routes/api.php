<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/post/{post:slug}/favorite', 'UserController@addFavPost');
Route::delete('/comment/{comment}/delete', 'CommentController@delete');
Route::post('/post/{post}/comment/store', 'CommentController@store');
Route::get('/post/{post}/comments', 'CommentController@comments');
