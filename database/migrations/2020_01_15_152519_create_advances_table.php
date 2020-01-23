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
            $table->string('ca_comp_code')->nullable(); //Company Name
            $table->string('ca_comp_name')->nullable(); //Company Name                                   
            $table->string('ca_emp_id')->nullable(); // Employee ID
            $table->string('ca_emp_name')->nullable(); // Employee Name                                   
            $table->date('ca_adv_date')->nullable(); // Advance Date
            $table->double('ca_adv_amt')->nullable(); // Advance amount                        
            $table->longText('ca_purpose')->nullable(); // Purpose of the advance
            $table->longText('ca_remarks')->nullable();
            $table->string('ca_status')->nullable();            
            $table->date('ca_pay_tran_date')->nullable();
            $table->string('ca_pay_remarks')->nullable();
            $table->string('ca_pay_id')->nullable();
            $table->string('ca_pay_name')->nullable();            
            $table->string('ca_pay_status')->nullable();    
            
            $table->string('ca_acc_year')->nullable();
            $table->string('ca_acc_month')->nullable();
            $table->string('ca_flex1')->nullable();
            $table->string('ca_flex2')->nullable();
            $table->integer('ca_flex3')->nullable();
            $table->integer('ca_flex4')->nullable();



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
