<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_certs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('min_del');
            $table->integer('min_gnd');
            $table->integer('min_twr');
            $table->integer('min_app');
            $table->integer('f11_del');
            $table->integer('f11_gnd');
            $table->integer('f11_twr');
            $table->integer('f11_app');
            $table->integer('zjx');
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
        Schema::dropIfExists('users_certs');
    }
}
