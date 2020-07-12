<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateLawfirmUserProfileAddCanViewBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lawfirm_user_profiles', function($table) {
            $table->boolean('can_view_bill')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lawfirm_user_profiles', function($table) {
            $table->dropColumn('can_view_bill');
        });
    }
}
