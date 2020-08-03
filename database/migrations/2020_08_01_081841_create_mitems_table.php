<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitems', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('item_code')->nullable()->unique();
            $table->string('item_name')->nullable();
            $table->integer('item_cost')->nullable();
            $table->integer('item_price')->nullable();
            $table->integer('item_warranty')->nullable();
            $table->integer('item_stock_yn')->nullable();
            $table->string('item_created_uid')->nullable();          


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
        Schema::dropIfExists('mitems');
    }
}
