<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class PostsViews extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
