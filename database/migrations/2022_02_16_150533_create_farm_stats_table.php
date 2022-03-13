<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_stats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('location')->nullable();
            $table->Integer('number_of_farm_lots')->nullable();
            $table->Integer('plots_harvested')->nullable();
            $table->Integer('plots_in_vegetative_state')->nullable();
            $table->Integer('plots_in_reproductive_state')->nullable();
            $table->string('map_image')->nullable();
            $table->string('map_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farm_stats');
    }
}
