<?php

use Faker\Generator as Faker;
use App\Models\ProductType;

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

$factory->define(ProductType::class, function (Faker $faker) {
    return [
        'type' => $faker->unique()->word(),
        'created_at' => date('Y-m-d H:i:s', time()),
        'updated_at' => date('Y-m-d H:i:s', time())
    ];
});
