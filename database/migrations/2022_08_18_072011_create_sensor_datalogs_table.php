<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_datalogs', function (Blueprint $table) {
            $table->id();
            $table->string('device_id', 10);
            $table->string('data_reading', 10);
            $table->string('data_reading_additional', 10)->nullable();
            $table->string('data_measurement', 20);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor_datalogs');
    }
};
