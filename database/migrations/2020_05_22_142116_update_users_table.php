<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
                       
            $table->timestamp('last_seen')->nullable();           
            $table->string('flex1')->nullable();
            $table->string('flex2')->nullable();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
                       
            $table->dropColumn('last_seen');           
            $table->dropColumn('flex1');
            $table->dropColumn('flex2');
        
        });
    }
}
