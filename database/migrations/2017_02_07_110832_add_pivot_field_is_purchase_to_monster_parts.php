<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPivotFieldIsPurchaseToMonsterParts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hair_user', function (Blueprint $table) {
            $table->tinyInteger('is_purchase')->default(0);

        });

        Schema::table('mask_user', function (Blueprint $table) {
            $table->tinyInteger('is_purchase')->default(0);

        });

        Schema::table('body_user', function (Blueprint $table) {
            $table->tinyInteger('is_purchase')->default(0);

        });

        Schema::table('suit_user', function (Blueprint $table) {
            $table->tinyInteger('is_purchase')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
