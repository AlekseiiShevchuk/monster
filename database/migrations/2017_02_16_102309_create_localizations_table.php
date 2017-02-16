<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('localizations')) {
            Schema::create('localizations', function (Blueprint $table) {
                $table->increments('id');
                $table->string('abbreviation');
                $table->string('name');
                $table->tinyInteger('is_active')->default(0);
                $table->string('language_file')->nullable();
                
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
        Schema::dropIfExists('localizations');
    }
}
