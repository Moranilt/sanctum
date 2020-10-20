<?php

use Illuminate\Database\Seeder;

class PostsViewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\PostsViews::class, App\Post::all()->count())->create();
    }
}
