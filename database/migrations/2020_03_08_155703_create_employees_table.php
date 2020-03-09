<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_name')->nullable();
            $table->string('emp_dob')->nullable();
            $table->string('emp_email')->nullable();
            $table->string('emp_gsm')->nullable();
            $table->string('emp_gender')->nullable();
            $table->string('emp_nationality')->nullable();
            $table->string('emp_religion_id')->nullable();
            $table->string('emp_country_id')->nullable();
            $table->string('emp_pass_no')->nullable();
            $table->date('emp_pass_exp_date')->nullable();
            $table->string('emp_civil_no')->nullable();
            $table->date('emp_civil_exp_date')->nullable();
            $table->string('emp_isfresher')->nullable();
            $table->string('emp_comp_id')->nullable();
            $table->string('emp_dept_id')->nullable();
            $table->string('emp_desi_id')->nullable();
            $table->string('emp_grade')->nullable();
            $table->date('emp_doj')->nullable();
            $table->string('emp_ispayroll')->nullable();
            $table->string('emp_sala_tran_bank_id')->nullable();
            $table->string('emp_sala_tran_br_id')->nullable();
            $table->string('emp_sala_acco_no')->nullable();
            $table->string('emp_currency')->nullable();
            $table->string('emp_insu_comp_id')->nullable();

            $table->string('emp_driv_lice_no')->nullable();
            $table->date('emp_driv_lice_exp_date')->nullable();

            $table->string('emp_id')->nullable();
            $table->string('emp_user_name')->nullable();
            $table->string('emp_pass')->nullable();
            $table->string('emp_islogin')->nullable();
            $table->string('emp_photo_path')->nullable();

            $table->string('emp_active')->nullable();
            $table->string('emp_remarks')->nullable();
            $table->string('emp_is_profile')->nullable();
            $table->string('emp_prob_period')->nullable();
            $table->string('emp_inactive_by')->nullable();
            $table->date('emp_inactive_date')->nullable();
            $table->string('emp_inactive_sepe')->nullable();
            $table->string('emp_inactive_reason')->nullable();
            $table->string('emp_created_by')->nullable();
            $table->date('emp_created_date')->nullable();
            
            $table->string('emp_flex1')->nullable();
            $table->string('emp_flex2')->nullable();
            $table->string('emp_flex3')->nullable();
            $table->string('emp_flex4')->nullable();
            $table->date('emp_flex5')->nullable();
            $table->date('emp_flex6')->nullable();
            
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
        Schema::dropIfExists('employees');
    }
}
