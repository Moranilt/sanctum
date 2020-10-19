<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->jobTitle;
    $slug = Str::slug($title, '-');
    $body = $faker->text;
    $excerpt = Str::limit($body, 40, '...');
    return [
        'user_id' => factory(App\User::class),
        'title' => $title,
        'slug' => $slug,
        'body' => $body,
        'excerpt' => $excerpt
    ];
});
