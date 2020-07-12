<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePassengersTableUpdateOptionToStatus extends Migration
{
    public $set_schema_table = 'passengers';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE ".$this->set_schema_table." MODIFY COLUMN status ENUM('Not Assigned', 'Active', 'Denied', 'Closed', 'Pending Payment', 'Undertaking Provided') NOT NULL DEFAULT 'Not Assigned'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE ".$this->set_schema_table." MODIFY COLUMN status ENUM('Not Assigned', 'Active', 'Denied', 'Closed', 'Pending Payment') NOT NULL DEFAULT 'Not Assigned'");
    }
}
