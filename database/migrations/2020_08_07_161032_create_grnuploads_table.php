<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateGrnuploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grnuploads', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('td_comp_code')->nullable(); 
            $table->string('td_tran_code')->nullable(); 
            $table->string('td_doc_no')->nullable(); 
            $table->string('td_doc_dt')->nullable(); 
            $table->string('td_doc_ref')->nullable(); 
            $table->integer('td_doc_amt')->nullable(); 
            $table->string('td_desc')->nullable(); 
            $table->string('td_cr_uid')->nullable(); 
            $table->date('td_cr_dt')->nullable();             
            $table->string('supp_code')->nullable();
            $table->string('supp_name')->nullable();
            $table->string('act_supp_code')->nullable();
            $table->string('act_supp_name')->nullable();            
            $table->date('supp_inv_date')->nullable();                        
            $table->integer('paid_amount1')->nullable();
            $table->integer('paid_amount2')->nullable();
            $table->integer('paid_amount3')->nullable();
            $table->date('paid_date1')->nullable();
            $table->date('paid_date2')->nullable();
            $table->date('paid_date3')->nullable();                        
            $table->string('paid_uid')->nullable();
            $table->integer('balance')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('wob')->nullable();
            $table->date('tran_date')->nullable();
            $table->string('grn_attach')->nullable();
            $table->integer('tran_doc_no1')->nullable();
            $table->integer('tran_doc_no2')->nullable();
            $table->integer('tran_doc_no3')->nullable();
            $table->string('narration')->nullable();
            $table->string('flex1')->nullable();
            $table->string('flex2')->nullable();
            $table->string('flex3')->nullable();
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
        Schema::dropIfExists('grnuploads');
    }
}
