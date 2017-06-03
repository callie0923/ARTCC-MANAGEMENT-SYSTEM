<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('artcc_code')->nullable();
            $table->string('vatusa_uls_key')->nullable();
            $table->string('vatusa_api_key')->nullable();
            $table->text('wx_nex_gen_radar')->nullable();
            $table->text('wx_vis_radar')->nullable();
            $table->text('wx_infrared_radar')->nullable();
            $table->text('wx_wind_surface_data')->nullable();
            $table->text('welcome_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_settings');
    }
}
