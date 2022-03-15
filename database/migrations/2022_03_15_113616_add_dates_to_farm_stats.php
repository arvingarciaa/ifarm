<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatesToFarmStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('farm_stats', function (Blueprint $table) {
            //
            $table->date('planting_status_image_date')->nullable();
            $table->date('quick_farm_stats_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('farm_stats', function (Blueprint $table) {
            //
            $table->dropColumn('planting_status_image_date');
            $table->dropColumn('quick_farm_stats_date');
        });
    }
}
