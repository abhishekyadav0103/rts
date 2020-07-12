<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawfirmUserProfilesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('lawfirm_user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('lawfirm_id')->unsigned();
            $table->string('title');
            $table->string('bar_number')->nullable();
            $table->string('license_issuance_state');
            $table->double('limit')->nullable();
            $table->string('statement_email');
            $table->string('additional_email')->nullable();
            $table->boolean('is_authorized')->default(0);
            $table->string('grade')->nullable();
            $table->boolean('close_to_limit')->nullable();
            $table->string('signature_image_path');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lawfirm_id')->references('id')->on('lawfirms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('lawfirm_user_profiles');
    }

}
