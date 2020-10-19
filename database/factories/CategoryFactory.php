<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $title = $faker->jobTitle;
    $slug = Str::slug($title, '-');
    return [
        'title' => $title,
        'slug' => $slug,
        'description' => $faker->paragraph,
    ];
});
