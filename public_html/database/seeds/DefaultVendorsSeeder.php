<?php

use Illuminate\Database\Seeder;
use App\Models\Vendor;

class DefaultVendorsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Vendor::class, rand(10, 100))->create();
    }

}
