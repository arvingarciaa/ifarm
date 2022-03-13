<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('farmers', function (Blueprint $table) {
            //
            $table->string('rsbsa_no')->nullable();
            $table->string('municipality')->nullable();
            $table->renameColumn('parcel_no', 'parcel_name');
            $table->renameColumn('source', 'source_db');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('farmers', function (Blueprint $table) {
            //
            $table->dropColumn('rsbsa_no');
            $table->dropColumn('municipality');
            $table->renameColumn('parcel_name', 'parcel_no');
            $table->renameColumn('source_db', 'source');
        });
    }
}
