<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'content' => $faker->text(200),
        'commentable_id' => \App\Category::query()->pluck('id')->random(),
        'commentable_type' => 'categories',
    ];
});
