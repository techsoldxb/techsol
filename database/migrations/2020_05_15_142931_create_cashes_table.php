<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('td_comp_code')->nullable(); 
            $table->string('td_tran_code')->nullable(); 
            $table->string('td_doc_no')->nullable(); 
            $table->string('td_doc_dt')->nullable(); 
            $table->string('td_doc_ref')->nullable(); 
            $table->integer('td_doc_amt')->nullable(); 
            $table->string('td_desc')->nullable(); 
            $table->string('td_cr_uid')->nullable(); 
            $table->string('td_cr_dt')->nullable(); 

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
        Schema::dropIfExists('cashes');
    }
}
