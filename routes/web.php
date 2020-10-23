<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/category/create', 'CategoryController@create');
    Route::post('/category/store', 'CategoryController@store');

    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/store', 'PostController@store')->name('post.store');
    Route::get('/post/{post:slug}/edit', 'PostController@edit')->name('post.edit');
    Route::patch('/post/{post:slug}/update', 'PostController@update')->name('post.update');
    Route::delete('/post/{post:slug}/delete', 'PostController@delete')->name('post.delete');

    Route::get('/post/{post:slug}/comment/store', 'CommentController@store')->name('comment.store');
    Route::get('/users/{user:slug}/edit', 'UserController@edit')->name('user.edit');
    Route::put('/users/{user:slug}/update', 'UserController@update')->name('user.update');

    Route::post('/users/{user:slug}/follow', 'FollowsController@store')->name('follow');
});
Route::get('/users/{user:slug}', 'UserController@show')->name('user.show');

Route::get('/admin-panel', 'AdminPanelController@index')->name('admin.index')->middleware('admin');

Route::get('/category/{category:slug}', 'CategoryController@show')->name('category.show');
Route::get('/tags/{tag:slug}', 'TagsController@show')->name('tag.show');

Route::get('/post/{post:slug}', 'PostController@show')->name('post.show');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('etc');
