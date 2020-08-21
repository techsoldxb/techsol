<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fb_comp_code')->nullable();
            $table->string('fb_number')->nullable();
            $table->string('fb_experience')->nullable();
            $table->string('fb_comments')->nullable();
            $table->string('fb_name')->nullable();
            $table->string('fb_mobile')->nullable();
            $table->string('fb_job_number')->unique();
            $table->string('fb_status')->nullable();
            $table->string('fb_coupon')->nullable()->unique();            
            $table->dateTime('fb_coupon_exp')->nullable();
            $table->string('fb_coupon_status')->nullable();
            $table->string('fb_invoice_amount')->nullable();
            $table->string('fb_coupon_amount')->nullable();            
            $table->string('fb_flex1')->nullable();
            $table->string('fb_flex2')->nullable();
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
        Schema::dropIfExists('feedback');
    }
}
