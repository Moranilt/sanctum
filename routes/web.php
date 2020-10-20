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

Route::get('/', function () {
    $last_posts = App\Post::orderBy('created_at', 'desc')->take(4)->get();
    $categories = App\Category::all();
    return view('main')->with(['last_posts' => $last_posts, 'categories' => $categories]);
})->name('home');

Route::get('/category/create', 'CategoryController@create');
Route::post('/category/store', 'CategoryController@store');
Route::get('/category/{category:slug}', 'CategoryController@show')->name('category.show');

Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/post/{post:slug}', 'PostController@show')->name('post.show');

Route::get('/post/{post:slug}/comment/store', 'CommentController@store')->name('comment.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('etc');
