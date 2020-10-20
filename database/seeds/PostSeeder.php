<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 10)->create()->each(function($post){
            $post->addCategory(App\Category::all()->random(rand(1, 2))->pluck('id')->toArray());
            $post->comments()->createMany(factory(App\Comment::class, 10)->make()->toArray());
            $post->views()->save(factory(App\PostsViews::class)->make());
        });



    }
}
