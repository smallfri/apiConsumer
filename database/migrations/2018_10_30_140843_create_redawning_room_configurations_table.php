<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedawningRoomConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redawning_room_configuration', function (Blueprint $table) {
            $table->integer('redawning_listing_id');
            $table->primary('redawning_listing_id');
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
        Schema::dropIfExists('redawning_room_configuration');
    }
}
