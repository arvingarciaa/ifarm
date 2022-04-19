<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFortyYearMeanToLandingPage extends Migration
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
            $table->decimal('forty_year_mean_1', 10, 1)->nullable();
            $table->decimal('forty_year_mean_2', 10, 1)->nullable();
            $table->decimal('forty_year_mean_3', 10, 1)->nullable();
            $table->decimal('forty_year_mean_4', 10, 1)->nullable();
            $table->decimal('forty_year_mean_5', 10, 1)->nullable();
            $table->decimal('forty_year_mean_6', 10, 1)->nullable();
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
            $table->dropColumn('forty_year_mean_1');
            $table->dropColumn('forty_year_mean_2');
            $table->dropColumn('forty_year_mean_3');
            $table->dropColumn('forty_year_mean_4');
            $table->dropColumn('forty_year_mean_5');
            $table->dropColumn('forty_year_mean_6');
        });
    }
}
