<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use App\Constants\Kangaroo;
use App\Models\Kangaroo as KangarooModel;
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

$factory->define(KangarooModel::class, function (Faker $faker) {
    return [
        'birth_date' => $faker->dateTimeBetween('1990-01-01', '2022-01-01'),
        'name' => $faker->firstName,
        'nickname' =>$faker->word,
        'color' => $faker->hexColor,
        'gender' => Arr::random(Kangaroo::GENDER),
        'friendliness' => Arr::random(Kangaroo::FRIENDLINESS),
        'weight' => $faker->numberBetween(35000, 90000), // grams
        'height' => $faker->numberBetween(650, 2000), // millimeters
    ];
});
