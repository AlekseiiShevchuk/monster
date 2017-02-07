<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5898cba57bd91MaskUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('mask_user')) {
            Schema::create('mask_user', function (Blueprint $table) {
                $table->integer('mask_id')->unsigned()->nullable();
                $table->foreign('mask_id', 'fk_p_11214_11211_user_mask')->references('id')->on('masks');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_11211_11214_mask_user')->references('id')->on('users');
                
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
        Schema::dropIfExists('mask_user');
    }
}
