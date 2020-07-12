<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('user_type')->insert([
            [
                'name' => 'admin'
            ],
            [
                'name' => 'approver'
            ],
            [
                'name' => 'book_keeper'
            ],
            [
                'name' => 'call_center_professional'
            ],
            [
                'name' => 'authorized_user'
            ],
            [
                'name' => 'regular_user'
            ],
        ]);
    }

}
