<?php

use Illuminate\Database\Seeder;
use App\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 15)->create()->each(function($post){
            $post->addCategory(App\Category::all()->random(rand(1, 3))->pluck('id')->toArray());
        });

    }
}
