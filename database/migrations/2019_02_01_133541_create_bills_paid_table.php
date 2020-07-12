<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsPaidTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('bills_paid', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill_id')->unsigned();
            $table->double('amount_paid');
            $table->text('payment_info');
            $table->integer('collected_by_user_id')->nullable();
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            
            $table->foreign('bill_id')->references('id')->on('bills');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('bills_paid');
    }

}
