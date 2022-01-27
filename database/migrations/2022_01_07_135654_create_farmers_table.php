<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('baranggay')->nullable();
            $table->string('source')->nullable();
            $table->string('parcel_no')->nullable();
            $table->string('parcel_area')->nullable();
            $table->string('planted_area')->nullable();
            $table->string('commodity')->nullable();
            $table->text('status')->nullable();
            $table->date('date_planted')->nullable();
            $table->string('development_stage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farmers');
    }
}
