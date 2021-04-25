<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\company;
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

$factory->define(company::class, function (Faker $faker) {
    return [
        'company_name' => $faker->name,
        'internet_address' => $faker->unique(),
   //     'remember_token' => Str::random(10),
    ];
});
