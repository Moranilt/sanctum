<?php

namespace App;
Use App\Helpers;
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

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
