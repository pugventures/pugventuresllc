<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class DefaultBrandsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Brand::class, rand(10, 100))->create();
    }

}
