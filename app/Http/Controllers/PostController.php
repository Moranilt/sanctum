<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\PostsViews;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $next = Post::where('id', '>', $post->id)->first();
        $previous = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();

        $views = PostsViews::where('post_id', $post->id)->first();
        if(empty($views)){
            $views = new PostsViews();
            $views->post_id = $post->id;
            $views->views = $views->views + 1;
            $views->save();
        }else{
            $views->views = $views->views + 1;
            $views->update();
        }



        return view('post.show', ['post' => $post, 'next' => $next, 'previous' => $previous]);
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
        $views = new PostsViews();
        $post->addViews($views);
        return redirect()->route('home');
    }

    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    public function update(Post $post, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'categories' => 'required'
        ]);
        $post->slug = Str::slug($data['title'], '-');
        $post->excerpt = Str::limit($data['body'], 40, '...');
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->update();
        $post->addCategory($data['categories']);
        return redirect()->route('post.show', $post->slug);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('home');
    }
}
