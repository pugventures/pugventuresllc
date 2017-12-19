<?php

use Illuminate\Database\Seeder;
use App\Models\ProductType;

class DefaultProductTypesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(ProductType::class, rand(1, 100))->create();
    }

}
