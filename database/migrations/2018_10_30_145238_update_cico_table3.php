<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCicoTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('redawning_cico');

        Schema::create('redawning_cico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('redawning_listing_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('check_in_allowed');
            $table->integer('check_out_allowed');
            $table->DateTime('created');
            $table->DateTime('updated');
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
        Schema::drop('redawning_cico');
    }
}
