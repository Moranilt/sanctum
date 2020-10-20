<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostsViews;
use Faker\Generator as Faker;

$factory->define(PostsViews::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(1, 10),
        'views' => $faker->numberBetween(20, 500)
    ];
});
