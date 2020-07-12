<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('passenger_id');
            $table->integer('lawfirm_user_id');
            $table->integer('callcenter_professional_id');
            $table->string('medium_to_book');
            $table->integer('source_address_id');
            $table->integer('destination_address_id');
            $table->string('source');
            $table->string('reference_num');
            $table->double('amount');
            $table->dateTimeTz('datetime_of_ride');
            $table->string('status');
            $table->integer('bill_id');
            $table->dateTimeTz('created_on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rides');
    }
}
