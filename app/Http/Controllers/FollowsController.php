<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->toggleFollow($user);

        return redirect()->back();
    }

    public function followers(User $user)
    {
        $followers = $user->followers;
        return view('follow.followers', ['followers' => $followers, 'user' => $user]);
    }

    public function following(User $user)
    {
        $following = $user->follows;
        return view('follow.following', ['following' => $following, 'user' => $user]);
    }
}
