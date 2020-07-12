<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReductionRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reduction_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill_id');
            $table->integer('raised_by_user_id');
            $table->string('status');
            $table->boolean('is_approved');
            $table->integer('approved_by_user_id');
            $table->integer('reduction_request_month');
            $table->integer('reduction_request_year');
            $table->integer('lawfirm_id');
            $table->string('note');
            $table->double('bill_amount');
            $table->double('requested_amount');
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
        Schema::dropIfExists('reduction_requests');
    }
}
