<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLockersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lockers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lockerid');
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('department')->nullable();
            $table->string('lockerno')->nullable();
            $table->date('issued_date')->nullable();
            $table->string('remarks')->nullable();
            $table->string('updated_userid')->nullable();
            $table->date('updated_date')->nullable();

            $table->string('last_user')->nullable();
            $table->date('return_date')->nullable();

            $table->string('flex1')->nullable();
            $table->string('flex2')->nullable();
            $table->string('flex3')->nullable();           
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
        Schema::dropIfExists('lockers');
    }
}
