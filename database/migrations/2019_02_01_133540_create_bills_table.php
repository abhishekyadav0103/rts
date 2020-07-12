<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lawfirm_id');
            $table->double('amount');
            $table->string('status');
            $table->string('notes')->nullable();
            $table->integer('bill_month')->nullable();
            $table->integer('bill_year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('bills');
    }

}
