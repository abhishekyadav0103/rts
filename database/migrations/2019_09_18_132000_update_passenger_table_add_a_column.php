<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePassengerTableAddAColumn extends Migration
{

	public $set_schema_table = 'passengers';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('passengers', function($table) {
            $table->integer('accident_type')->unsigned()->nullable();
			$table->integer('liability')->unsigned()->nullable();
			$table->integer('client_outstanding_meds_to_date')->unsigned()->nullable();
			$table->integer('insurance')->unsigned()->nullable();
			$table->integer('property_damage')->unsigned()->nullable();
			$table->integer('rx_coverage')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
