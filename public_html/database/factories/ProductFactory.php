<?php

use Faker\Generator as Faker;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Brand;

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

$factory->define(Product::class, function (Faker $faker) {
    if (empty($productTypes = ProductType::all())) {
        factory(ProductType::class)->create();
    }
    if (empty($brands = Brand::all())) {
        factory(Brand::class)->create();
    }
    if (empty($vendors = Vendor::all())) {
        factory(Vendor::class)->create();
    }
    
    return [
        'title' => $faker->words($nbWords = rand(1, 3), true),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'callout' => $faker->text($maxNbChars = 250),
        'description' => $faker->text($maxNbChars = 500),
        'sku' => $faker->ean8(),
        'seo_page_title' => $faker->words($nbWords = rand(1, 3), true),
        'seo_meta_desc' => $faker->text($maxNbChars = 160),
        'seo_url' => $faker->url(),
        'product_type_id' => !empty($productTypes) ? $productTypes[rand(0, sizeof($productTypes)-1)]->id : null,
        'brand_id' => 1,
        'vendor_id' => 1,
        'purchase_url' => $faker->url(),
        'created_at' => date('Y-m-d H:i:s', time()),
        'updated_at' => date('Y-m-d H:i:s', time())
    ];
});
