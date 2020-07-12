<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDefaultToPassengers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE passengers CHANGE status status ENUM('Not Assigned', 'Under Review', 'Active', 'Denied', 'Closed Paid', 'Closed Paid Pending Payment') DEFAULT 'Under Review'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       DB::statement("ALTER TABLE passengers CHANGE status status ENUM('Not Assigned', 'Under Review', 'Active', 'Denied', 'Closed Paid', 'Closed Paid Pending Payment') DEFAULT 'Under Review'");
    }
}
