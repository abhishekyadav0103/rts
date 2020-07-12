<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DownloadBillData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CLAIM_NUMBER');
			$table->string('CLAIM_STATUS');
			$table->string('INT_CLAIM_NUMBER');
			$table->string('CARRIER');
			$table->string('FILLER1');
			$table->string('GROUP');
			$table->string('FILLER2');
			$table->string('RX_NUMBER');
			$table->string('FILL_DATE');
			$table->string('WRITTEN_DATE');
			$table->string('SUBMITTED_DATE');
			$table->string('SUBMITTED_TIME');
			$table->string('GENERIC_BRAND_IND');
			$table->string('COMPOUND_IND');
			$table->string('COB_IND');
			$table->string('REFILL_IND');
			$table->string('FORMULARY_IND');
			$table->string('FILLER3');
			$table->string('PRICE_SOURCE');
			$table->string('AUTHORIZATION_CODE');
			$table->string('MEMBER_REIMBURSEMENT');
			$table->string('NDC');
			$table->string('GPI');
			$table->string('DRUG_NAME');
			$table->string('MANUFACTUREER');
			$table->string('PACK_SIZE');
			$table->string('DRUG_STRENGTH');
			$table->string('QUANTITY_DISPENSED');
			$table->string('DAYS_SUPPLY');
			$table->string('DAW');
			$table->string('PHARMACY_NABP');
			$table->string('PHARMACY_NPI');
			$table->string('PHARMACY_NAME');
			$table->string('PHARMACY_CHAIN');
			$table->string('PHARMACY_NETWORK');
			$table->string('MEMBER_ID');
			$table->string('PERSON_CODE');
			$table->string('MEMBER_FIRST_NAME');
			$table->string('MEMBER_LAST_NAME');
			$table->string('MEMBER_DOB');
			$table->string('Gender');
			$table->string('MEMBER_RELATIONSHIP');
			$table->string('PRESCRIBER_SUBMITTED_ID');
			$table->string('PRESCRIBER_NPI');
			$table->string('PRESCRIBER_DEA');
			$table->string('PRESCRIBER_FIRST_NAME');
			$table->string('PRESCRIBER_LAST_NAME');
			$table->string('AWP');
			$table->string('SUBMITTED_USUAL_AND_CUSTOMARY_AMT');
			$table->string('SUBMITTED_AMT');
			$table->string('SUBMITTED_ING_COST');
			$table->string('SUBMITTED_DISPENSING_FEE');
			$table->string('CLIENT_PAID_AMT');
			$table->string('CLIENT_ING_COST');
			$table->string('CLIENT_COPAY');
			$table->string('CLIENT_DEDUCTIBLE');
			$table->string('CLIENT_COINSURANCE');
			$table->string('CLIENT_SALES_TAX');
			$table->string('Client_Dispensing_Fee');
			$table->string('DiagnosisCodeQualifier');
			$table->string('DiagnosisCode');
			$table->string('Filler');
			$table->string('Filler_1');
			$table->string('Filler_2');
			$table->string('Filler_3');
			$table->string('Filler4');
			$table->string('Filler5');
			$table->string('Filler6');
			$table->string('CardHolder_SSN');
			$table->string('Filler7');
			$table->string('Member_SSN');
			$table->string('Filler8');
			$table->string('Filler9');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
