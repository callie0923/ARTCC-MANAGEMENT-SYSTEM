<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->integer('order_index');
            $table->string('icon');
            $table->integer('need_auth');
            $table->timestamps();
        });

        Schema::create('forum_boards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->text('name');
            $table->text('description');
            $table->integer('order_index');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('forum_categories')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('forum_threads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('board_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('name');
            $table->text('message');
            $table->integer('views')->default(0);
            $table->integer('locked')->default(0);
            $table->integer('sticky')->default(0);
            $table->timestamps();

            $table->foreign('board_id')->references('id')->on('forum_boards')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('forum_thread_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thread_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('message');
            $table->timestamps();

            $table->foreign('thread_id')->references('id')->on('forum_boards')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('forum_read_threads', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('thread_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('thread_id')->references('id')->on('forum_boards')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
