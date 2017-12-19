<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class DefaultProductsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Product::class, 1435)->create();
    }
}
    