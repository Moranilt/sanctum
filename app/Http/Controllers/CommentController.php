<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $data = $request->validate([
            'message' => 'required',
            'parent_id' => 'integer|nullable'
        ]);

        $comment = new Comment();
        if(isset($data['parent_id'])){
            if(!is_null($data['parent_id'])){
                $comment->parent_id = $data['parent_id'];
            }
        }
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post->id;
        $comment->body = $data['message'];
        $comment->save();

        return redirect()->back();
    }
}
