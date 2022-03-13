<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFarmingStatusMapToLandingPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_page', function (Blueprint $table) {
            //
            $table->text('planting_status_map_title')->nullable();
            $table->text('planting_status_map_subtitle')->nullable();
            $table->text('planting_status_map_image')->nullable();
            $table->text('planting_status_map_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_page', function (Blueprint $table) {
            //
            $table->dropColumn('planting_status_map_title');
            $table->dropColumn('planting_status_map_subtitle');
            $table->dropColumn('planting_status_map_image');
            $table->dropColumn('planting_status_map_link');
        });
    }
}
