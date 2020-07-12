<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('passengers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->date('dob');
            $table->smallInteger('gender');
            $table->string('social_security_number', 20)->nullable();
            $table->string('mobile_number');
            $table->string('alternate_number')->nullable();
            $table->string('notes_for_driver')->nullable();
            $table->double('transportation_limit')->nullable();
            $table->string('signature_image_path');
            $table->enum('status', ['Not Assigned', 'Active', 'Denied', 'Closed Paid', 'Closed Paid Pending Payment']);
            $table->integer('approver_id')->nullable()->unsigned();
            $table->text('approver_notes')->nullable();
            $table->double('overridden_reduction_percentage')->nullable();
            $table->boolean('requested_for_increased_limit')->nullable();
            $table->double('increased_transportation_limit')->nullable();
            $table->smallInteger('mark_as_checked')->default(0);
            $table->integer('created_by')->unsigned();
            $table->timestamps();

            $table->foreign('approver_id')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('passengers');
    }

}
