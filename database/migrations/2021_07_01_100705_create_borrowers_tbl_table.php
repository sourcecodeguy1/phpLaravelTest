<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowersTblTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            
            $table->boolean('job')->nullable();
            $table->integer('monthly_income')->nullable();
            $table->MEDIUMTEXT('job_company_name')->nullable();
            $table->MEDIUMTEXT('job_designation')->nullable();
            $table->MEDIUMTEXT('job_description')->nullable();

            $table->boolean('bank_account')->nullable();
            $table->MEDIUMTEXT('bank_name')->nullable();
            $table->integer('current_bank_balance')->nullable();
            $table->MEDIUMTEXT('bank_description')->nullable();

            $table->MEDIUMTEXT('borrower_description')->nullable();
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
        Schema::dropIfExists('borrowers_tbl');
    }
}
