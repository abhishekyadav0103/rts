<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_comment', function($table) {
            $table->string('document')->nullable()->after('comment');
            $table->tinyInteger('status')->nullable()->comment('1=>Public, 2=>Private')->after('document');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_comment', function($table) {
            $table->dropColumn('document');
            $table->dropColumn('status');
        });
    }
}
