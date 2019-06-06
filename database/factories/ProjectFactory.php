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

$factory->define(\App\Project::class, function (Faker $faker) {
    $title = $faker->sentence(rand(1, 3), true);
    $description = $faker->realText(rand(300, 700));
    $createdAt = $faker->dateTimeBetween('-3 months', '-2 months');
    $data =  [
        'title' => $title,
        'slug' => \Illuminate\Support\Str::slug($title),
        'description' => $description,
        'content' => $description . $description,
        'meta_title' => $faker->text(rand(100, 250)),
        'meta_description' => $faker->realText(rand(100, 250)),
        'meta_keywords' => $faker->realText(rand(100, 250)),
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];

    return $data;
});