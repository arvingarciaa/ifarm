<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_page', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('top_banner')->nullable()->default("ifarm_v1.png");
            $table->text('agri_monitoring_title')->nullable();
            $table->text('agri_monitoring_subtitle')->nullable();
            $table->Integer('agri_monitoring_position')->nullable()->default(1);
            $table->text('maps_title')->nullable();
            $table->text('maps_subtitle')->nullable();
            $table->Integer('maps_position')->nullable()->default(2);
            $table->text('rainfall_title')->nullable();
            $table->text('rainfall_subtitle')->nullable();
            $table->Integer('rainfall_position')->nullable()->default(3);
            $table->text('analytics_title')->nullable();
            $table->text('analytics_subtitle')->nullable();
            $table->Integer('analytics_position')->nullable()->default(4);
            $table->text('news_title')->nullable();
            $table->text('news_subtitle')->nullable();
            $table->Integer('news_position')->nullable()->default(5);
            $table->string('app_image')->nullable()->default("11.png");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landing_page');
    }
}
