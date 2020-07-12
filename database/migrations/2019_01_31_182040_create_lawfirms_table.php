<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawfirmsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('lawfirms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lawfirm_code')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('contact_number');
            $table->string('signature_image_path');
            $table->boolean('is_history')->nullable();
            $table->double('default_reduction_percentage', 5, 2)->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('lawfirms');
    }

}
