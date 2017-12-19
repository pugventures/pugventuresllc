<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
                DefaultUsersSeeder::class,
                DefaultProductTypesSeeder::class,
                DefaultBrandsSeeder::class,
                DefaultVendorsSeeder::class,
                DefaultProductsSeeder::class,
        ]);
    }
}
