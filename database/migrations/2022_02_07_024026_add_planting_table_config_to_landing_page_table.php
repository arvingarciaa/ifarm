<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlantingTableConfigToLandingPageTable extends Migration
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
            $table->Integer('last_name_access')->default('2');
            $table->Integer('first_name_access')->default('2');
            $table->Integer('gpx_id_access')->default('2');
            $table->Integer('rsbsa_no_access')->default('2');
            $table->Integer('municipality_access')->default('2');
            $table->Integer('barangay_access')->default('2');
            $table->Integer('source_db_access')->default('2');
            $table->Integer('parcel_name_access')->default('2');
            $table->Integer('parcel_area_access')->default('2');
            $table->Integer('planted_area_access')->default('2');
            $table->Integer('commodity_access')->default('2');
            $table->Integer('status_access')->default('2');
            $table->Integer('date_planted_access')->default('2');
            $table->Integer('development_stage_access')->default('2');
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
            $table->dropColumn('last_name_access');
            $table->dropColumn('first_name_access');
            $table->dropColumn('gpx_id_access');
            $table->dropColumn('rsbsa_no_access');
            $table->dropColumn('municipality_access');
            $table->dropColumn('barangay_access');
            $table->dropColumn('source_db_access');
            $table->dropColumn('parcel_name_access');
            $table->dropColumn('parcel_area_access');
            $table->dropColumn('planted_area_access');
            $table->dropColumn('commodity_access');
            $table->dropColumn('status_access');
            $table->dropColumn('date_planted_access');
            $table->dropColumn('development_stage_access');
        });
    }
}
