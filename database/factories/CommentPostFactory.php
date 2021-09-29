<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'content' => $faker->text(200),
        'commentable_id' => \App\Post::query()->pluck('id')->random(),
        'commentable_type' => 'posts',
    ];
});
