<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixRedawningPhotoTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('redawning_room_photos');

        Schema::create('redawning_photos', function (Blueprint $table) {
            $table->integer('redawning_listing_id');
            $table->primary('redawning_listing_id');
            $table->string('url', 255);
            $table->integer('order');
            $table->text('tags');
            $table->text('title');
            $table->integer('width');
            $table->integer('height');
            $table->string('timestamp',255);
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
        Schema::drop('red_awning_listings');
    }
}
