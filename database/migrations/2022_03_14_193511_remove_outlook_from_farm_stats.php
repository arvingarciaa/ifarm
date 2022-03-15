<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveOutlookFromFarmStats extends Migration
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
            $table->dropColumn('outlook_1');
            $table->dropColumn('outlook_2');
            $table->dropColumn('outlook_3');
            $table->dropColumn('outlook_4');
            $table->dropColumn('outlook_5');
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
            $table->Integer('outlook_1')->nullable();
            $table->Integer('outlook_2')->nullable();
            $table->Integer('outlook_3')->nullable();
            $table->Integer('outlook_4')->nullable();
            $table->Integer('outlook_5')->nullable();
        });
    }
}
