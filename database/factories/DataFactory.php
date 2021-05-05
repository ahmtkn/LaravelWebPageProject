<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    static $password;
    return [
        'name'=>$faker->name,
        'email'=>$faker->email,
        'password'=>$password ? $password : bcrypt('123456'),
        'remember_token'=>str_random(10),
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence,
        'body'=>$faker->paragraph(35),
        'user_id'=>rand(1,10),
        'category_id'=>rand(1,10),
        'is_published'=>rand(0,1),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
    ];
});

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
    ];
});

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id'=>rand(1,10),
        'post_id'=>rand(1,10),
        'body'=>$faker->paragraph(35),
    ];
});
