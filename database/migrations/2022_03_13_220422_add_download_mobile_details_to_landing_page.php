<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDownloadMobileDetailsToLandingPage extends Migration
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
            $table->text('mobile_download_title')->nullable();
            $table->text('mobile_download_subtitle')->nullable();
            $table->text('mobile_download_image')->nullable();
            $table->text('mobile_download_link')->nullable();
            $table->text('mobile_download_note')->nullable();
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
            $table->dropColumn('mobile_download_title');
            $table->dropColumn('mobile_download_subtitle');
            $table->dropColumn('mobile_download_image');
            $table->dropColumn('mobile_download_link');
            $table->dropColumn('mobile_download_note');
        });
    }
}
