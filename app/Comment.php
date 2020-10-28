<?php

namespace App;
use App\Helpers;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use Helpers;

    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
