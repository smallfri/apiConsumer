<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedawningStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redawning_status', function (Blueprint $table) {
            $table->integer('redawning_listing_id');
            $table->primary('redawning_listing_id');
            $table->integer('published');
            $table->integer('bookable');
            $table->integer('open');
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
        Schema::dropIfExists('redawning_status');
    }
}
