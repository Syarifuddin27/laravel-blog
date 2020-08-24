<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => 1,
                'title' => $faker->name,
                'slug' => $faker->unique(false)->numberBetween(1111000, 9999000),
                'content' => $faker->text,
                'harga_jual' => $faker->unique(false)->numberBetween(50000, 100000),
                'harga_grosir' => $faker->unique(false)->numberBetween(25000, 50000),
                'qty' => $faker->unique(true)->numberBetween(5, 20),
                'featured' => 'uploads/posts/education.jpg',
                'category_id' => $faker->unique(false)->numberBetween(1, 5),
    ];
});
