<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_code')->nullable();
            $table->string('username');
            $table->string('password');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('contact_number', 20)->nullable();
            $table->integer('type_id')->unsigned();
            $table->smallInteger('is_admin')->default(0);
            $table->integer('source_application_id')->nullable();
            $table->smallInteger('status');
            $table->rememberToken();
            $table->integer('created_by')->nullable();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('user_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
