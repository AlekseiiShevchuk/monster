<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1486408611UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('current_hair_id')->unsigned()->nullable();
                $table->foreign('current_hair_id', 'fk_11213_hair_current_hair_id_user')->references('id')->on('hairs')->onDelete('cascade');
                $table->integer('current_mask_id')->unsigned()->nullable();
                $table->foreign('current_mask_id', 'fk_11214_mask_current_mask_id_user')->references('id')->on('masks')->onDelete('cascade');
                $table->integer('current_body_id')->unsigned()->nullable();
                $table->foreign('current_body_id', 'fk_11215_body_current_body_id_user')->references('id')->on('bodies')->onDelete('cascade');
                $table->integer('current_suit_id')->unsigned()->nullable();
                $table->foreign('current_suit_id', 'fk_11216_suit_current_suit_id_user')->references('id')->on('suits')->onDelete('cascade');
                
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
            $table->dropForeign('fk_11213_hair_current_hair_id_user');
            $table->dropIndex('fk_11213_hair_current_hair_id_user');
            $table->dropColumn('current_hair_id');
            $table->dropForeign('fk_11214_mask_current_mask_id_user');
            $table->dropIndex('fk_11214_mask_current_mask_id_user');
            $table->dropColumn('current_mask_id');
            $table->dropForeign('fk_11215_body_current_body_id_user');
            $table->dropIndex('fk_11215_body_current_body_id_user');
            $table->dropColumn('current_body_id');
            $table->dropForeign('fk_11216_suit_current_suit_id_user');
            $table->dropIndex('fk_11216_suit_current_suit_id_user');
            $table->dropColumn('current_suit_id');
            
        });

    }
}
