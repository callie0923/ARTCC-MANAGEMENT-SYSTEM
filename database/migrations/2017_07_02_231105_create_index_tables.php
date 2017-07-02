<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index_promotions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('cid');
            $table->string('new_text');
            $table->timestamps();
        });

        Schema::create('index_members', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('cid');
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
        Schema::drop('index_members');
        Schema::drop('index_promotions');
    }
}
