<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5898cba5795faHairUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('hair_user')) {
            Schema::create('hair_user', function (Blueprint $table) {
                $table->integer('hair_id')->unsigned()->nullable();
                $table->foreign('hair_id', 'fk_p_11213_11211_user_hair')->references('id')->on('hairs');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_11211_11213_hair_user')->references('id')->on('users');
                
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
        Schema::dropIfExists('hair_user');
    }
}
