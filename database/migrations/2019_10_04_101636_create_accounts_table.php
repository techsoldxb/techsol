<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comp')->nullable();
            $table->string('tran_code')->nullable();
            $table->string('tran_no')->nullable();
            $table->string('crea_date')->nullable();
            $table->string('emp_name')->nullable();
            $table->string('dept')->nullable();
            $table->string('supp_name')->nullable();
            $table->string('bill_date')->nullable();
            $table->string('bill_no')->nullable();
            $table->float('bill_amt')->nullable();
            $table->string('pay_mode')->nullable();
            $table->string('purpose')->nullable();
            $table->string('remarks')->nullable();
            $table->string('paid')->nullable();
            $table->string('item_type')->nullable();
            $table->string('attach')->nullable();
            $table->string('status')->nullable();
            $table->string('flex1')->nullable();
            $table->string('flex2')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
