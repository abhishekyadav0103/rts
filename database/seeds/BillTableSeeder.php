<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('bills')->insert([
            [
                'lawfirm_id' => 1,
                'amount' => '1000.00',
                'status' => 'Pending',
            ],
            [
                'lawfirm_id' => 2,
                'amount' => '1200.00',
                'status' => 'Pending',
            ],
            [
                'lawfirm_id' => 3,
                'amount' => '810.00',
                'status' => 'Pending',
            ],
        ]);
    }

}
