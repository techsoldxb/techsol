<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobcards', function (Blueprint $table) {
            $table->bigIncrements('id');           
            
            $table->string('job_comp_code')->nullable();
            $table->string('job_comp_name')->nullable();
            $table->string('job_year')->nullable();
            $table->string('job_month')->nullable();
            $table->string('job_engr')->nullable();

            $table->string('job_enq_number')->nullable();
            $table->date('job_enq_date')->nullable();

            $table->string('job_cust_name')->nullable();
            $table->string('job_cust_mobile')->nullable();
            $table->string('job_cust_email')->nullable();

            $table->string('job_item_details')->nullable();
            $table->string('job_item_brand')->nullable();
            $table->string('job_item_model')->nullable();
            $table->string('job_item_serial')->nullable();

            $table->string('job_item_type')->nullable();
            $table->string('job_fault')->nullable();
            
            $table->string('job_desc')->nullable();
            $table->string('job_type')->nullable();
            $table->string('job_remarks')->nullable();
            $table->string('job_tech_remark')->nullable();
            $table->string('job_status_id')->nullable();
            $table->string('job_status_name')->nullable();

            $table->date('job_est_date')->nullable();
            $table->integer('job_est_amount')->nullable();
            
            $table->integer('job_est_remark')->nullable();
            $table->string('job_item_used')->nullable();
            $table->string('job_item_cost')->nullable();

            $table->string('job_out_source')->nullable();

            $table->date('job_completed_date')->nullable();
            $table->string('job_completed_by')->nullable();
            $table->string('job_completed_remark')->nullable();

            $table->string('job_invoice_number')->nullable();
            $table->date('job_invoice_date')->nullable();
            $table->integer('job_invoice_amount')->nullable();
            $table->integer('job_invoice_discount')->nullable();
            
            $table->string('job_invoice_remark')->nullable();
            $table->date('job_quit_date')->nullable();
            $table->string('job_quit_remarks')->nullable();
            $table->string('job_delivery')->nullable();
            $table->string('job_delivery_remark')->nullable();
            $table->date('job_delivery_date')->nullable();
            $table->string('job_warranty')->nullable();

          
            $table->string('job_enq_created_user')->nullable();
            $table->string('job_est_created_user')->nullable();
            $table->string('job_comp_created_user')->nullable();
            $table->string('job_inv_created_user')->nullable();
            $table->string('job_flex1')->nullable();
            $table->string('job_flex2')->nullable();
            $table->string('job_flex3')->nullable();
            $table->string('job_flex4')->nullable();
            $table->string('job_flex5')->nullable();
            $table->string('job_flex6')->nullable();
            $table->string('job_flex7')->nullable();
            $table->date('job_flex8')->nullable();
            $table->date('job_flex9')->nullable();
            $table->string('job_flex10')->nullable();
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
        Schema::dropIfExists('jobcards');
    }
}
