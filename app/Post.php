<?php

namespace App;
Use App\Helpers;
use App\PostsViews;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Helpers;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addCategory($category)
    {
        return $this->categories()->attach($category);
    }

    public function addViews($views)
    {
        return $this->views()->save($views);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function views()
    {
        return $this->hasOne(PostsViews::class);
    }

    public function countViews()
    {
        return $this->views->views;
    }

    public function countComments()
    {
        return $this->allComments->count();
    }

    public function allComments()
    {
        return $this->hasMany(Comment::class);
    }

    public function popularPost()
    {
        return $this->views()->orderBy('views', 'desc')->first();
    }
}
