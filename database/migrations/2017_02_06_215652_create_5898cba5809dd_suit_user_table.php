<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5898cba5809ddSuitUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('suit_user')) {
            Schema::create('suit_user', function (Blueprint $table) {
                $table->integer('suit_id')->unsigned()->nullable();
                $table->foreign('suit_id', 'fk_p_11216_11211_user_suit')->references('id')->on('suits');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_11211_11216_suit_user')->references('id')->on('users');
                
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
        Schema::dropIfExists('suit_user');
    }
}
