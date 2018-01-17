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

$factory->define(App\ProfilePicture::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 52),
        'url' =>$faker->imageUrl(400, 400, 'people'),
        'current' => true
    ];
});
