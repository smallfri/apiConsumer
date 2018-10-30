<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixListingsTable extends Migration
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
            $table->integer("listing_id");
            $table->primary('listing_id');
            $table->string('url_alias');
            $table->text('content');
            $table->text("cico");
            $table->text("cico_times");
            $table->text("price");
            $table->text("price_periods");
            $table->text("availability");
            $table->text("status");
            $table->text("photos");
            $table->text("policies");
            $table->text("repconfig");
            $table->DateTime('created');
            $table->DateTime('updated');
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
