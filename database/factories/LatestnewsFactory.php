<?php

use Faker\Generator as Faker;

$factory->define(App\Latestnews::class, function (Faker $faker) {
    $title =  $faker->sentence();
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'is_active' => 1,
        'description' => $faker->paragraph(20),
        'image' => $faker->imageUrl(),
        'user_id' => 1
    ];
});
