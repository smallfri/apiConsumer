<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixRedawningContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('redawning_room_configuration');

        Schema::create('redawning_room_configuration', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('redawning_listing_id');
            $table->text('name');
            $table->text('beds');
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
        Schema::drop('redawning_room_configuration');
    }
}
