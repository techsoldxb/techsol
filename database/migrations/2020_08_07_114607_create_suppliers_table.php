<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supp_comp_code')->nullable();
            $table->string('supp_code')->nullable();
            $table->string('supp_name')->nullable();
            $table->string('supp_tel')->nullable();
            $table->string('supp_email')->nullable();
            $table->string('supp_contact')->nullable();
            $table->string('supp_payment_term')->nullable();
            $table->string('supp_created_uid')->nullable();
            $table->string('supp_status')->nullable();            
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
        Schema::dropIfExists('suppliers');
    }
}
