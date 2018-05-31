<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

//$factory->define(App\Post::class, function (Faker $faker) {
//    $sentence=$faker->sentence;
//    return [
//        'title' => $sentence,
//        'slug' => str_slug($sentence),
//        'content' => $faker->text(200),
//        'user_id' => $faker->numberBetween(1,2),
//        'category_id' => $faker->numberBetween(1,6)
//    ];
//});
