<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();            
            $table->string('address')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();

            $table->string('proc_contact')->nullable();
            $table->string('proc_designation')->nullable();
            $table->string('proc_telephone')->nullable();
            $table->string('proc_mobile')->nullable();
            $table->string('proc_email')->nullable();            

            $table->string('it_contact')->nullable();
            $table->string('it_designation')->nullable();
            $table->string('it_telephone')->nullable();
            $table->string('it_mobile')->nullable();
            $table->string('it_email')->nullable();       

            $table->string('acc_contact')->nullable();
            $table->string('acc_designation')->nullable();
            $table->string('acc_telephone')->nullable();
            $table->string('acc_mobile')->nullable();
            $table->string('acc_email')->nullable();

            $table->string('customer_response')->nullable();
            $table->string('feedback')->nullable();
            $table->string('followup1')->nullable();
            $table->string('followup2')->nullable();
            $table->string('followup3')->nullable();           


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
        Schema::dropIfExists('customers');
    }
}
