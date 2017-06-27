<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtcTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_atc', function(Blueprint $table) {
            $table->integer('user_id');
            $table->string('position');
            $table->string('frequency');
            $table->string('controller_name');
            $table->string('rating_id');
            $table->text('atis');
            $table->string('start_time');
        });

        Schema::create('controller_atc_log', function(Blueprint $table) {
            $table->integer('user_id');
            $table->string('date');
            $table->string('start_time');
            $table->string('duration');
            $table->string('stream_update');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
