<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixRedawningPhotoTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('redawning_photos');

        Schema::create('redawning_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('redawning_listing_id');
            $table->text('url');
            $table->integer('order');
            $table->text('tags');
            $table->text('title');
            $table->integer('width');
            $table->integer('height');
            $table->dateTime('timestamp');
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
        Schema::drop('redawning_photos');
    }
}
