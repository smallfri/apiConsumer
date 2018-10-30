<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedawningCicoTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redawning_cico_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('redawning_listing_id');
            $table->integer('check_in_start');
            $table->integer('check_in_end');
            $table->integer('check_out');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('redawning_cico_times');
    }
}
