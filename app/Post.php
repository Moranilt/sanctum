<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post');
    }

    public function user()
    {
        return $this->belognsTo(User::class);
    }

    public function addCategory($category)
    {
        return $this->categories()->attach($category);
    }
}
