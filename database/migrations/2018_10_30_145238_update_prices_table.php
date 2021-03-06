<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('redawning_prices');

        Schema::create('redawning_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('redawning_listing_id');
            $table->text('currency');
            $table->float('base_weekday_price');
            $table->float('base_weekend_price');
            $table->float('base_weekly_price');
            $table->integer('base_minstay');
            $table->integer('other');
            $table->integer('tax_percent');
            $table->integer('nightly_tax');
            $table->float('cleaning_fee');
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
        Schema::drop('redawning_prices');
    }
}
