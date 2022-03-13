<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsWeightToLandingPage extends Migration
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
            $table->dropColumn('status_access');
            $table->Integer('ext_name_weight')->default('4');
            $table->Integer('ext_name_access')->default('2');
            $table->Integer('last_name_weight')->default('2');
            $table->Integer('first_name_weight')->default('3');
            $table->Integer('gpx_id_weight')->default('5');
            $table->Integer('rsbsa_no_weight')->default('1');
            $table->Integer('municipality_weight')->default('6');
            $table->Integer('barangay_weight')->default('7');
            $table->Integer('parcel_name_weight')->default('8');
            $table->Integer('parcel_area_weight')->default('9');
            $table->Integer('planted_area_weight')->default('11');
            $table->Integer('commodity_weight')->default('10');
            $table->Integer('date_planted_weight')->default('12');
            $table->Integer('development_stage_weight')->default('13');
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
            $table->Integer('status_access')->default('2');
            $table->dropColumn('ext_name_weight');
            $table->dropColumn('ext_name_access');
            $table->dropColumn('last_name_weight');
            $table->dropColumn('first_name_weight');
            $table->dropColumn('gpx_id_weight');
            $table->dropColumn('rsbsa_no_weight');
            $table->dropColumn('municipality_weight');
            $table->dropColumn('barangay_weight');
            $table->dropColumn('parcel_name_weight');
            $table->dropColumn('parcel_area_weight');
            $table->dropColumn('planted_area_weight');
            $table->dropColumn('commodity_weight');
            $table->dropColumn('date_planted_weight');
            $table->dropColumn('development_stage_weight');
        });
    }
}
