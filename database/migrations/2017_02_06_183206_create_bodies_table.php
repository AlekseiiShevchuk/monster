<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('bodies')) {
            Schema::create('bodies', function (Blueprint $table) {
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
        Schema::dropIfExists('bodies');
    }
}
