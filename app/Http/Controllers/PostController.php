<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('post.show')->with('post', $post);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'categories' => 'required'
        ]);

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->title = $data['title'];
        $post->slug = Str::slug($data['title'], '-');
        $post->excerpt = Str::limit($data['body'], 40, '...');
        $post->body = $data['body'];
        $post->save();
        $post->addCategory($data['categories']);

        return redirect()->route('home');
    }
}
