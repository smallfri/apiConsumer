<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRedawningPricePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('redawning_price_periods');

        Schema::create('redawning_price_periods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('redawning_listing_id');
            $table->date('period_start');
            $table->date('period_end');
            $table->float('weekday_price');
            $table->float('weekend_price');
            $table->float('weekly_price');
            $table->integer('minstay');
            $table->integer('price_period_id');
            $table->text('name');
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
        Schema::dropIfExists('redawning_price_periods');
    }
}
