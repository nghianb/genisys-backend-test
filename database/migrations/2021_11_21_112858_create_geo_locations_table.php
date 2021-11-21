<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeoLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_locations', function (Blueprint $table) {
            $table->id();
            $table->float('latitude');
            $table->float('longitude');
            $table->string('country_code');
            $table->string('country_code3')->nullable();
            $table->string('country_name');
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->unsignedInteger('postal_code')->nullable();
            $table->unsignedInteger('area_code')->nullable();
            $table->unsignedInteger('dma_code')->nullable();
            $table->unsignedInteger('metro_code')->nullable();
            $table->string('continent_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geo_locations');
    }
}
