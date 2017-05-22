<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('elev')->nullable();
            $table->string('country')->nullable();
            $table->string('municipality')->nullable();
            $table->string('icao')->nullable();
            $table->string('iata')->nullable();
            $table->boolean('is_artcc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airports');
    }
}
