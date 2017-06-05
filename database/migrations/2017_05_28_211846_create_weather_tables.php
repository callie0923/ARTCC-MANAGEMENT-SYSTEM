<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeatherTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airport_weather', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('airport_id')->unsigned();
            $table->text('metar');
            $table->string('flight_cat');
            $table->string('wind');
            $table->string('altim_in_hg');
            $table->timestamps();

            $table->foreign('airport_id')->references('id')
                ->on('airports')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather');
    }
}
