<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advances', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->string('cd_comp_code')->nullable(); //Company Name
            $table->string('cd_comp_name')->nullable(); //Company Name
                                   
            $table->string('cd_emp_id')->nullable(); // Employee ID
            $table->string('cd_emp_name')->nullable(); // Employee Name                                   
            
            $table->double('cd_advance_amt')->nullable(); // Advance amount                        
            $table->longText('cd_purpose')->nullable(); // Purpose of the advance
            $table->longText('cd_remarks')->nullable();
            $table->string('cd_status')->nullable();            
            $table->date('cd_pay_tran_date')->nullable();
            $table->string('cd_pay_remarks')->nullable();
            $table->string('cd_pay_id')->nullable();
            $table->string('cd_pay_name')->nullable();            
            
            $table->string('cd_acc_year')->nullable();
            $table->string('cd_acc_month')->nullable();
            $table->string('cd_flex1')->nullable();
            $table->string('cd_flex2')->nullable();
            $table->integer('cd_flex3')->nullable();
            $table->integer('cd_flex4')->nullable();



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
        Schema::dropIfExists('advances');
    }
}
