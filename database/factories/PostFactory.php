<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->unique()->jobTitle;
    $slug = Str::slug($title, '-');
    $body = $faker->text;
    $excerpt = Str::limit($body, 40, '...');
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'title' => $title,
        'slug' => $slug,
        'body' => $body,
        'excerpt' => $excerpt
    ];
});
