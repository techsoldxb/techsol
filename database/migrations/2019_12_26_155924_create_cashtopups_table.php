<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashtopupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashtopups', function (Blueprint $table) {
            $table->bigIncrements('id');
           


            $table->string('comp_code')->nullable(); //Company Name
            $table->string('dept_code')->nullable(); // Department Name           
            $table->string('emp_id')->nullable(); // Employee ID
            $table->string('emp_name')->nullable(); // Employee Name                        
            $table->date('topup_dt')->nullable(); // Purchase bill date                        
            $table->double('topup_amt')->nullable(); // Purchase bill amount            
            $table->string('bank_name')->nullable(); // Purchase bill amount            
            $table->string('cheque_no')->nullable(); // Purchase bill amount            
            $table->string('pay_mode')->nullable(); // Payment mode - cash or card            
            $table->longText('remarks')->nullable();        
            $table->string('source')->nullable();  
            $table->string('flex1')->nullable();
            $table->string('flex2')->nullable();
            $table->integer('flex3')->nullable();
            $table->integer('flex4')->nullable();
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
        Schema::dropIfExists('cashtopups');
    }
}
