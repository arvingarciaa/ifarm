<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtRiskPlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_risk_plots', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->string('gpx_id')->nullable();
            $table->double('ndvi_value')->nullable();
            $table->double('area_gis')->nullable();
            $table->Integer('development_stage')->nullable();
            $table->Integer('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('at_risk_plots');
    }
}
