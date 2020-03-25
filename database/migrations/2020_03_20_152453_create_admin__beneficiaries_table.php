<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin__beneficiaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ben_name')->nullable();    
            $table->string('ben_contact')->nullable();
            $table->string('ben_email')->nullable();  
            $table->string('ben_mobile')->nullable(); 
            $table->string('ben_relation')->nullable();     
            $table->string('ben_limit')->nullable();    
            $table->string('ben_type')->nullable();    
            $table->string('ben_status')->nullable();    
            $table->string('ben_user_id')->nullable();          
            $table->string('ben_user_name')->nullable();      
            $table->string('flex_1')->nullable();       
            $table->string('flex_2')->nullable();       
            $table->string('flex_3')->nullable();       
            $table->string('flex_4')->nullable();       
            $table->string('flex_5')->nullable();       
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
        Schema::dropIfExists('admin__beneficiaries');
    }
}
