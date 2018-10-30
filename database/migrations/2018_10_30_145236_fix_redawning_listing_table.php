<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixRedawningListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('red_awning_listings');

        Schema::create('red_awning_listings', function (Blueprint $table) {
            $table->integer('listing_id');
            $table->primary('listing_id');
            $table->string('url_alias');
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
        Schema::drop('red_awning_listings');
    }
}
