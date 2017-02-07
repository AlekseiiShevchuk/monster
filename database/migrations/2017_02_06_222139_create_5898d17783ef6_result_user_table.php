<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5898d17783ef6ResultUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('result_user')) {
            Schema::create('result_user', function (Blueprint $table) {
                $table->integer('result_id')->unsigned()->nullable();
                $table->foreign('result_id', 'fk_p_11220_11211_user_result')->references('id')->on('results');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_11211_11220_result_user')->references('id')->on('users');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('result_user');
    }
}
