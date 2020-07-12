<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(UserTypeSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(ApplicationsTableSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(BillTableSeeder::class);
    }

}
