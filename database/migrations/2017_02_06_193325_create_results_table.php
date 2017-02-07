<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('results')) {
            Schema::create('results', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_11211_user_user_id_result')->references('id')->on('users')->onDelete('cascade');
                $table->integer('test_id')->unsigned()->nullable();
                $table->foreign('test_id', 'fk_11219_test_test_id_result')->references('id')->on('tests')->onDelete('cascade');
                $table->integer('earned_scores')->nullable()->unsigned();
                $table->integer('correct_answers')->nullable()->unsigned();
                $table->integer('incorrect_answers')->nullable()->unsigned();
                
                $table->timestamps();
                
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
        Schema::dropIfExists('results');
    }
}
