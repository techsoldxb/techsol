<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChequesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheques', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('comp_code');
            $table->string('comp_name');
            $table->string('bank_code');
            $table->string('bank_name');
            $table->string('tran_date');
            $table->string('name');
            $table->date('chq_date');
            $table->integer('amount');
            $table->string('chq_number');
            $table->string('reference');
            $table->string('narration');
            $table->string('tran_total');
            $table->string('status');
            $table->date('status_date');            
            $table->string('currency');
            $table->string('flex1');
            $table->string('flex2');
            $table->string('flex3');
            $table->date('flex4');
            $table->date('flex5');
            $table->timestamps();

            // Status 0 - Not cleared
            // Status 1 - Cleared
            // Status 2 - Canceled
            // Status 3 - Bounced
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cheques');
    }
}
