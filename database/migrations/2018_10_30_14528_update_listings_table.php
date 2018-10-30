<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('redawning_listings');

        Schema::create('redawning_listings', function (Blueprint $table) {
            $table->integer('listing_id');
            $table->primary('listing_id');
            $table->string('url_alias');
            $table->string('cico_times');
            $table->string('price');
            $table->string('status');
            $table->string('photos');
            $table->string('policies');
            $table->string('repconfig');
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
        Schema::drop('redawning_listings');
    }
}
