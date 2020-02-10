<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tb_cust_name')->nullable(); //Company Name
            $table->string('tb_cust_addr')->nullable(); //Company Name
            $table->string('tb_cust_contact')->nullable(); // Department Name
            $table->string('tb_cust_mobile')->nullable(); // Transaction Code
            $table->string('tb_cust_email')->nullable(); // Transaction Number
            $table->date('tb_date')->nullable(); // Employee ID
            $table->string('tb_time')->nullable(); // Employee Name            
            $table->string('tb_kids')->nullable(); //Supplier Name
            $table->string('tb_adult')->nullable(); //Supplier Contact
            $table->string('tb_pay_mode')->nullable(); // Purchase bill date
            $table->string('tb_reference')->nullable(); // Purchase bill number
            $table->string('tb_category')->nullable(); // Purchase bill amount   

            $table->string('tb_type')->nullable(); // Purchase bill amount   
            $table->string('tb_age')->nullable(); // Purchase bill amount   
            $table->string('tb_language')->nullable(); // Purchase bill amount   


            $table->string('tb_comment')->nullable();            
            $table->integer('tb_student_qty')->nullable(); // Total calculated from the item details
            $table->integer('tb_teacher_qty')->nullable(); // Payment mode - cash or card
            $table->integer('tb_adult_qty')->nullable(); // Purpose of the purchase

            $table->integer('tb_addon1_qty')->nullable(); // Payment mode - cash or card
            $table->integer('tb_addon2_qty')->nullable(); // Payment mode - cash or card
            $table->integer('tb_addon3_qty')->nullable(); // Payment mode - cash or card
            
            
            $table->double('tb_student_price')->nullable();
            $table->double('tb_teacher_price')->nullable();
            $table->double('tb_adult_price')->nullable();
            $table->double('tb_addon1_price')->nullable();
            $table->double('tb_addon2_price')->nullable();
            $table->double('tb_addon3_price')->nullable();

            
            $table->string('tb_addon1_name')->nullable();   
            $table->string('tb_addon2_name')->nullable();   
            $table->string('tb_addon3_name')->nullable();   

            $table->double('tb_total')->nullable();
            $table->string('tb_status')->nullable();

            $table->string('tb_user_id')->nullable(); // Employee Name    
            $table->string('tb_user_name')->nullable(); // Employee Name  
            
            
            $table->string('tb_appr_user_id')->nullable(); // Employee Name    
            $table->string('tb_appr_user_name')->nullable(); // Employee Name  
            $table->date('tb_appr_date')->nullable(); // Employee ID
            $table->string('tb_appr_remarks')->nullable(); // Employee Name  

            $table->string('tb_flex1')->nullable(); // Employee Name  
            $table->string('tb_flex2')->nullable(); // Employee Name  
            $table->string('tb_flex3')->nullable(); // Employee Name  
            $table->string('tb_flex4')->nullable(); // Employee Name  
                
      
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
        Schema::dropIfExists('bookings');
    }
}
