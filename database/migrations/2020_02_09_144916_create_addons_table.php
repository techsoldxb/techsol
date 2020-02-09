<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('addon_name')->unique();
            $table->string('addon_desc');
            $table->string('addon_price')->nullable();
            $table->string('addon_status')->nullable();
            $table->string('created_user_id');
            $table->string('created_user_name');
            $table->string('addon_flex1')->nullable();
            $table->string('addon_flex2')->nullable();
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
        Schema::dropIfExists('addons');
    }
}
