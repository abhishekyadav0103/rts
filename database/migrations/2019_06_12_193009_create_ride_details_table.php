<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRideDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ride_id')->unsigned();
            $table->string('status');
            $table->text('response');
            $table->timestamps();

            $table->foreign('ride_id')->references('id')->on('rides');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ride_details');
    }
}
