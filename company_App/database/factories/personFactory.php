<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\person;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(person::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->name,
        'title' => $faker->title,
        'internet_address' => $faker->unique(),
        'phone_number' => $faker->name

        //     'remember_token' => Str::random(10),
    ];
});
