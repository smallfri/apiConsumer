<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedawningRoomPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redawning_room_photos', function (Blueprint $table) {
            $table->integer('redawning_listing_id');
            $table->primary('redawning_listing_id');
            $table->text('url');
            $table->integer('order');
            $table->text('tags');
            $table->text('title');
            $table->integer('width');
            $table->integer('height');
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
        Schema::dropIfExists('redawning_room_photos');
    }
}
