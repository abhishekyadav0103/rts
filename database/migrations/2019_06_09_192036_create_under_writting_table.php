<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnderWrittingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('under_writting', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('passenger_id');
            $table->string('date_of_loss', 20)->nullable();
            $table->string('client_first_name')->nullable();
            $table->string('client_last_name')->nullable();
            $table->string('client_dob', 20)->nullable();
            $table->string('attorney_first_name')->nullable();
            $table->string('attorney_last_name')->nullable();
            $table->string('law_firm_name')->nullable()->nullable();
            $table->string('law_firm_email')->nullable();
            $table->text('summary_of_case')->nullable();
            $table->string('personal_injury_sustained')->nullable();
            $table->string('plan_for_case')->nullable();
            $table->string('plan_for_case_other')->nullable();
            $table->string('amount_of_releif')->nullable();
            $table->string('insurance_carrier')->nullable();
            $table->string('insurance_type')->nullable()->nullable();
            $table->string('insurance_type_other')->nullable();
            $table->string('insurance_coverage')->nullable();
            $table->string('insurance_declaration_file_path')->nullable();
            $table->string('police_report_filed')->nullable();
            $table->string('issued_ticket_by_police')->nullable();
            $table->string('issued_ticket_by_police_other')->nullable();
            $table->string('admitted_fault')->nullable();
            $table->string('admitted_fault_other')->nullable();
            $table->string('incident_country')->nullable();
            $table->string('incident_state')->nullable();
            $table->string('initial_medical')->nullable();
            $table->string('medical_spent')->nullable();
            $table->text('medical_service')->nullable();
            $table->string('signature_image_path');
            $table->integer('created_by')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('under_writting');
    }
}
