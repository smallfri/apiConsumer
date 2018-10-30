<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RedAwningListings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('red_awning_listings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('listing_id');
            $table->string('url_alias');
            $table->string('content');
            $table->string('title');
            $table->text('description');
            $table->string('property_type');
            $table->text('special_terms');
            $table->string('view');
            $table->integer('bathrooms');
            $table->integer('bedrooms');
            $table->integer('beds_king');
            $table->integer('beds_queen');
            $table->integer('beds_double');
            $table->integer('beds_twin');
            $table->integer('beds_sofa');
            $table->integer('beds_bunk');
            $table->integer('beds_air_mattress');
            $table->string('kitchen');
            $table->string('pool');
            $table->string('children_ok');
            $table->text('room_configurations');
            $table->text('data');
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