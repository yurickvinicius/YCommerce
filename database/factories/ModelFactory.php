<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(YCommerce\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(YCommerce\Category::class, function ($faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->sentence(),
    ];
});

$factory->define(YCommerce\Product::class, function ($faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->sentence(),
        'price' => $faker->randomNumber(2),
        'featured' => $faker->numberBetween(0,1),
        'recomended' => $faker->numberBetween(0,1),
        'category_id' => $faker->numberBetween(1,15),
    ];
});
