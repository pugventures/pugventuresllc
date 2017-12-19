<?php

use Faker\Generator as Faker;
use App\Models\Vendor;

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

$factory->define(Vendor::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->words($nb = rand(1,3), true),
        'contact_name' => $faker->firstName(array_rand(array('male', 'female'),1)) . ' ' . $faker->lastName(),
        'contact_phone' => $faker->phoneNumber(),
        'contact_email' => $faker->email(),
        'catalog_url' => $faker->url(),
        'created_at' => date('Y-m-d H:i:s', time()),
        'updated_at' => date('Y-m-d H:i:s', time())
    ];
});

