<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5898cba57e337BodyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('body_user')) {
            Schema::create('body_user', function (Blueprint $table) {
                $table->integer('body_id')->unsigned()->nullable();
                $table->foreign('body_id', 'fk_p_11215_11211_user_body')->references('id')->on('bodies');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_11211_11215_body_user')->references('id')->on('users');
                
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
        Schema::dropIfExists('body_user');
    }
}
