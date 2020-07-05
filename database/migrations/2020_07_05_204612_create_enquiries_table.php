<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('enq_comp_code')->nullable(); 
            $table->string('enq_comp_name')->nullable(); 
            $table->string('enq_tran_code')->nullable(); 
            $table->string('enq_tran_no')->nullable(); 
            $table->date('enq_tran_date')->nullable(); 
            $table->string('enq_cust_name')->nullable(); 
            $table->string('enq_gender')->nullable(); 
            $table->string('enq_mobile')->nullable(); 
            $table->string('enq_email')->nullable(); 
            $table->date('enq_date')->nullable(); 
            $table->string('enq_time')->nullable(); 
            $table->string('enq_purpose')->nullable(); 
            $table->string('enq_item_details')->nullable(); 
            $table->string('enq_group')->nullable(); 
            $table->string('enq_category')->nullable(); 
            $table->string('enq_comments')->nullable(); 
            $table->string('enq_user')->nullable(); 
            $table->string('enq_status')->nullable(); 
            $table->string('enq_flex1')->nullable(); 
            $table->string('enq_flex2')->nullable();


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
        Schema::dropIfExists('enquiries');
    }
}
