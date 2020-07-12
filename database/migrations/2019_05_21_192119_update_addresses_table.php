<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function($table) {
            $table->integer('passenger_id')->nullable()->after('id');
            $table->string('address_type_other')->nullable()->after('address_type');
            $table->string('phone_number')->nullable()->after('address_type_other');
            $table->string('business_name')->nullable()->after('phone_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function($table) {
            $table->dropColumn('passenger_id');
            $table->dropColumn('address_type_other');
            $table->dropColumn('phone_number');
            $table->dropColumn('business_name');
        });
    }
}
