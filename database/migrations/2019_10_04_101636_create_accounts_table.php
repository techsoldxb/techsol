<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('th_comp_code')->nullable(); //Company Name
            $table->string('th_comp_name')->nullable(); //Company Name
            $table->string('th_dept_code')->nullable(); // Department Name
            $table->string('th_tran_code')->nullable(); // Transaction Code
            $table->string('th_tran_no')->nullable(); // Transaction Number
            $table->string('th_emp_id')->nullable(); // Employee ID
            $table->string('th_emp_name')->nullable(); // Employee Name            
            $table->string('th_supp_name')->nullable(); //Supplier Name
            $table->date('th_bill_dt')->nullable(); // Purchase bill date
            $table->string('th_bill_no')->nullable(); // Purchase bill number
            $table->double('th_bill_amt')->nullable(); // Purchase bill amount            
            $table->string('th_pay_mode')->nullable(); // Payment mode - cash or card
            $table->longText('th_purpose')->nullable(); // Purpose of the purchase
            $table->longText('th_remarks')->nullable();
            $table->string('th_pay_status')->nullable();
            $table->date('th_pay_date')->nullable();
            $table->date('th_pay_tran_date')->nullable();
            $table->string('th_pay_remarks')->nullable();
            $table->string('th_pay_id')->nullable();
            $table->string('th_pay_name')->nullable();
            $table->date('th_item_type')->nullable();
            $table->string('th_attach')->nullable();
            $table->string('th_status')->nullable();
            $table->string('th_flex1')->nullable();
            $table->string('th_flex2')->nullable();
            $table->integer('th_flex3')->nullable();
            $table->integer('th_flex4')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
