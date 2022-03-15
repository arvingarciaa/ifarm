<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMinMaxMeanToLandingPage extends Migration
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
            $table->decimal('min_1', 10, 1)->nullable();
            $table->decimal('min_2', 10, 1)->nullable();
            $table->decimal('min_3', 10, 1)->nullable();
            $table->decimal('min_4', 10, 1)->nullable();
            $table->decimal('min_5', 10, 1)->nullable();
            $table->decimal('max_6', 10, 1)->nullable();
            $table->decimal('max_1', 10, 1)->nullable();
            $table->decimal('max_2', 10, 1)->nullable();
            $table->decimal('max_3', 10, 1)->nullable();
            $table->decimal('max_4', 10, 1)->nullable();
            $table->decimal('max_5', 10, 1)->nullable();
            $table->decimal('min_6', 10, 1)->nullable();
            $table->decimal('mean_1', 10, 1)->nullable();
            $table->decimal('mean_2', 10, 1)->nullable();
            $table->decimal('mean_3', 10, 1)->nullable();
            $table->decimal('mean_4', 10, 1)->nullable();
            $table->decimal('mean_5', 10, 1)->nullable();
            $table->decimal('mean_6', 10, 1)->nullable();
            $table->date('outlook_month')->nullable();
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
            $table->dropColumn('min_1');
            $table->dropColumn('min_2');
            $table->dropColumn('min_3');
            $table->dropColumn('min_4');
            $table->dropColumn('min_5');
            $table->dropColumn('min_6');
            $table->dropColumn('max_1');
            $table->dropColumn('max_2');
            $table->dropColumn('max_3');
            $table->dropColumn('max_4');
            $table->dropColumn('max_5');
            $table->dropColumn('max_6');
            $table->dropColumn('mean_1');
            $table->dropColumn('mean_2');
            $table->dropColumn('mean_3');
            $table->dropColumn('mean_4');
            $table->dropColumn('mean_5');
            $table->dropColumn('mean_6');
            $table->dropColumn('outlook_month');
        });
    }
}
