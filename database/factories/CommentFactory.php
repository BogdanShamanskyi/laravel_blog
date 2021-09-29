<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $types = new \Illuminate\Support\Collection(['posts', 'categories']);

    return [
        'name' => $faker->name,
        'content' => $faker->text(200),
        'commentable_id' => 1,
        'commentable_type' => $types->random(),
    ];
});
