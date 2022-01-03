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
            $table->text('weather_title')->nullable();
            $table->text('weather_subtitle')->nullable();
            $table->text('weather_image')->nullable();
            $table->text('weather_link')->nullable();
            $table->string('weather_background')->nullable()->default('#f8fafc');
            $table->Integer('weather_background_type')->nullable()->default(0);
            $table->text('weather_underground_api')->nullable();
            $table->text('open_weather_map_api')->nullable();
            $table->Integer('weather_position')->nullable()->default(1);
            $table->Integer('weather_visibility')->nullable()->default(1);
            $table->text('bulletin_title')->nullable();
            $table->text('bulletin_date')->nullable();
            $table->text('bulletin_subtitle')->nullable();
            $table->text('bulletin_advisory')->nullable();
            $table->text('bulletin_download')->nullable();
            $table->string('bulletin_background')->nullable()->default('#f8fafc');
            $table->Integer('bulletin_background_type')->nullable()->default(0);
            $table->Integer('bulletin_position')->nullable()->default(2);
            $table->Integer('bulletin_visibility')->nullable()->default(1);
            $table->text('vegetation_title')->nullable();
            $table->text('vegetation_subtitle')->nullable();
            $table->Integer('vegetation_position')->nullable()->default(3);
            $table->Integer('vegetation_visibility')->nullable()->default(1);
            $table->string('vegetation_background')->nullable()->default('#f8fafc');
            $table->Integer('vegetation_background_type')->nullable()->default(0);
            $table->text('maps_title')->nullable();
            $table->text('maps_subtitle')->nullable();
            $table->Integer('maps_position')->nullable()->default(4);
            $table->Integer('maps_visibility')->nullable()->default(1);
            $table->string('maps_background')->nullable()->default('#f8fafc');
            $table->Integer('maps_background_type')->nullable()->default(0);
            $table->text('news_title')->nullable();
            $table->text('news_subtitle')->nullable();
            $table->Integer('news_position')->nullable()->default(5);
            $table->Integer('news_visibility')->nullable()->default(1);
            $table->string('news_background')->nullable()->default('#f8fafc');
            $table->Integer('news_background_type')->nullable()->default(0);
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
