<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlantingStatusSectionToLandingPageTable extends Migration
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
            $table->text('planting_status_title')->nullable();
            $table->text('planting_status_subtitle')->nullable();
            $table->Integer('planting_status_position')->nullable()->default(3);
            $table->Integer('planting_status_visibility')->nullable()->default(1);
            $table->string('planting_status_background')->nullable()->default('#f8fafc');
            $table->Integer('planting_status_background_type')->nullable()->default(0);
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
            $table->dropColumn('planting_status_title');
            $table->dropColumn('planting_status_subtitle');
            $table->dropColumn('planting_status_position');
            $table->dropColumn('planting_status_visibility');
            $table->dropColumn('planting_status_background');
            $table->dropColumn('planting_status_background_type');
        });
    }
}
