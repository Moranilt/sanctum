<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profile.show', ['user' => $user, 'posts' => $user->posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('profile.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255', 'string', Rule::unique('users')->ignore($user)],
            'avatar' => ['file'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed'],
            'description' => ['string', 'required', 'max:255'],
            'facebook' => ['max:255', 'nullable', 'url'],
            'instagram' => ['max:255', 'nullable', 'url'],
            'google' => ['max:255', 'nullable', 'url'],
            'twitter' => ['max:255', 'nullable', 'url']
        ]);

        if($request->avatar){
            $data['avatar'] = $request->avatar->store('avatars');
        }

        $data['password'] = Hash::make($data['password']);
        $data['slug'] = Str::slug($data['name'], '-');
        $user->update($data);

        return redirect()->route('user.show', $user->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addFavPost(Post $post, Request $request)
    {
        $user = User::find($request->user_id);
        $user->toggleFavoritePost($post);
        if($user->isFavoritePost($post)){
            $message = true;
        }else{
            $message = false;
        }
        //$user->toggleFavoritePost($post);
        return response()->json(['message' => $message]);
    }
}
