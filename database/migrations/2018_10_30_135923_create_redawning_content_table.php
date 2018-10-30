<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedAwningContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redawning_content', function (Blueprint $table) {
            $table->integer('redawning_listing_id');
            $table->primary('redawning_listing_id');
            $table->integer('title');
            $table->text('description');
            $table->text('property_type');
            $table->text('special_terms');
            $table->text('view');
            $table->integer('bathrooms');
            $table->integer('bedrooms');
            $table->integer('beds_king');
            $table->integer('beds_queen');
            $table->integer('beds_double');
            $table->integer('beds_twin');
            $table->integer('beds_sofa');
            $table->integer('beds_bunk');
            $table->integer('beds_air_mattress');
            $table->integer('kitchen');
            $table->integer('pool');
            $table->integer('children_ok');
            $table->integer('room_configurations_id');
            $table->integer('sleep_max');
            $table->integer('pets_allowed');
            $table->integer('smoking_allowed');
            $table->integer('amenities');
            $table->integer('location');
            $table->integer('handicap_accessible');
            $table->integer('square_feet');
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
        Schema::dropIfExists('redawning_content');
    }
}
