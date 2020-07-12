<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPassengerIdColumnToReductionRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reduction_requests', function (Blueprint $table) {
            $table->integer('passenger_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reduction_requests', function (Blueprint $table) {
            $table->dropColumn('passenger_id');
        });
    }
}
