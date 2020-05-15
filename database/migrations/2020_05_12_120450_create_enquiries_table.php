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
            $table->integer('TD_COMP_CODE')->nullable(); 
            $table->string('TD_TRAN_CODE')->nullable(); 
            $table->string('TD_DOC_NO')->nullable(); 
            $table->string('TD_DOC_DT')->nullable(); 
            $table->string('TD_DOC_REF')->nullable(); 
            $table->integer('TD_DOC_AMT')->nullable(); 
            $table->string('TD_DESC')->nullable(); 
            $table->string('TD_CR_UID')->nullable(); 
            $table->string('TD_CR_DT')->nullable(); 

                       
                      
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
