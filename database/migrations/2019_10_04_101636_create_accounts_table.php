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
            $table->string('th_comp_code')->nullable();
            $table->string('th_tran_code')->nullable();
            $table->string('th_tran_no')->nullable();
            $table->string('th_emp_id')->nullable();
            $table->string('th_emp_name')->nullable();
            $table->string('th_dept_code')->nullable();
            $table->string('th_supp_name')->nullable();
            $table->date('th_bill_dt')->nullable();
            $table->string('th_bill_no')->nullable();
            $table->float('th_bill_amt')->nullable();
            $table->string('th_pay_mode')->nullable();
            $table->longText('th_purpose')->nullable();
            $table->longText('th_remarks')->nullable();
            $table->string('th_pay_status')->nullable();
            $table->string('th_item_type')->nullable();
            $table->string('th_attach')->nullable();
            $table->string('th_status')->nullable();
            $table->string('th_flex1')->nullable();
            $table->string('th_flex2')->nullable();
            $table->integer('th_flex3')->nullable();
            $table->integer('th_flex4')->nullable();
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
