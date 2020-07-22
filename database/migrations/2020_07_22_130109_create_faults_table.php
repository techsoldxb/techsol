<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faults', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('job_fault_desc')->nullable();
            $table->string('job_fault_desc_short')->nullable();
            $table->integer('job_fault_price')->nullable();
            $table->string('job_fault_group')->nullable();
            
            $table->string('job_fault_os')->nullable();
            $table->string('job_fault_created_uid')->nullable();
            $table->dateTime('job_fault_created_date')->nullable();
            $table->dateTime('job_fault_updated_date')->nullable();
            $table->string('job_fault_status')->nullable();
            $table->string('job_fault_comp_code')->nullable();
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
        Schema::dropIfExists('faults');
    }
}
