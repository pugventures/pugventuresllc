<?php

use Illuminate\Database\Seeder;

class DefaultUsersSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'name' => 'Donny Hansen',
            'email' => 'dhansen@pugventuresllc.com',
            'password' => bcrypt('F10na*77'),
            'avatar' => 'dhansen.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

}
