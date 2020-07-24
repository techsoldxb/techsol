<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterJobcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobcards', function (Blueprint $table) {
            

            $table->string('job_work_remark')->nullable();
            $table->dateTime('job_work_date')->nullable();

            $table->string('job_waiting_remark')->nullable();
            $table->dateTime('job_waiting_date')->nullable();

            $table->string('job_return_remark')->nullable();
            $table->dateTime('job_return_date')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobcards', function (Blueprint $table) {
            $table->dropColumn('job_work_remark');
            $table->dropColumn('job_work_date');
            $table->dropColumn('job_waiting_remark');
            $table->dropColumn('job_waiting_date');
            $table->dropColumn('job_return_remark');
            $table->dropColumn('job_return_date');
        });
    }
}
