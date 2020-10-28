<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;
use App\Socials;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getAvatarAttribute($value)
    {
        return asset($value ? "/storage/{$value}" : '/img/default-avatar.png');
    }

    public function getDescriptionAttribute($value)
    {
        return $value ? $value : 'Tell this world more about yourself ;)';
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getIsAdminAttribute()
    {
        return $this->roles->pluck('name')->contains('admin');
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function isPostAuthor($post)
    {
        return $this->posts()->get()->contains($post);
    }

    public function favoritePosts()
    {
        return $this->belongsToMany(Post::class, 'favorite_posts', 'user_id', 'post_id');
    }

    public function addFavoritePost($post)
    {
        return $this->favoritePosts()->save($post);
    }

    public function removeFavoritePost($post)
    {
        return $this->favoritePosts()->detach($post);
    }

    public function isFavoritePost($post)
    {
        return $this->favoritePosts()->where('post_id', $post->id)->exists();
    }

    public function toggleFavoritePost($post)
    {
        if($this->isFavoritePost($post)){
            return $this->removeFavoritePost($post);
        }

        return $this->addFavoritePost($post);
    }
}
