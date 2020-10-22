<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\PostsViews;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $last_posts = Post::orderBy('created_at', 'desc')->take(4)->get();
        $mostWatchedPosts = PostsViews::whereDate('created_at', today())->orderBy('views', 'desc')->get()->take(3);
        $categories = Category::all();

        return view('main')->with(['last_posts' => $last_posts, 'categories' => $categories, 'mostWatchedPosts' => $mostWatchedPosts]);
    }
}
