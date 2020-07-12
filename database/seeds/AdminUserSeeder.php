<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            [
                'user_code' => 'Ad01',
                'username' => 'admin@dispostable.com',
                'password' => Hash::make('Password@1'),
                'firstname' => 'admin',
                'lastname' => 'admin',
                'email' => 'admin@dispostable.com',
                'type_id' => 1,
                'is_admin' => 1,
                'source_application_id' => 1,
                'status' => 1,
            ],
        ]);
    }

}
