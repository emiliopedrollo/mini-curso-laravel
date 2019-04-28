<?php

use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/**
 * @var Factory $factory
 */

$factory->define(Post::class, function (Faker $faker) {
    static $users;

    if ($users === null) $users = User::get();

    return [
        'title' => $title = $faker->unique()->words(rand(4,9),true),
        'slug' => Str::slug($title),
        'content' => $faker->paragraphs(rand(1,5),true),
        'author_id' => $users->random()->id
    ];
});
