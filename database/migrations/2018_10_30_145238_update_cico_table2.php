<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCicoTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('redawning_cico');

        Schema::create('redawning_cico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('redawning_listing_id');
            $table->string('url_alias');
            $table->string('cico_times');
            $table->string('price');
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
        Schema::drop('redawning_cico');
    }
}
