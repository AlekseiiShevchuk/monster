<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('masks')) {
            Schema::create('masks', function (Blueprint $table) {
                $table->increments('id');
                $table->string('image');
                $table->integer('price')->nullable()->unsigned();
                $table->tinyInteger('available_as_default')->default(0);
                
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
        Schema::dropIfExists('masks');
    }
}
