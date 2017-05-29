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
            $table->integer('user_id')->default(0);
            $table->integer('min_del')->default(0);
            $table->integer('min_gnd')->default(0);
            $table->integer('min_twr')->default(0);
            $table->integer('min_app')->default(0);
            $table->integer('maj_del')->default(0);
            $table->integer('maj_gnd')->default(0);
            $table->integer('maj_twr')->default(0);
            $table->integer('maj_app')->default(0);
            $table->integer('enroute')->default(0);
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
