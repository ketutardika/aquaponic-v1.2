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
        Schema::create('sensor_devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_id', 20);
            $table->string('device_name', 50);
            $table->text('device_notes')->nullable();
            $table->string('device_measurement', 90)->nullable();
            $table->float('device_last_value', 10, 0)->nullable();
            $table->string('device_last_check', 90)->nullable();
            $table->integer('device_pin')->nullable();
            $table->boolean('device_status')->default(false);
            $table->string('device_api_key', 32)->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('farm_id')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('sensor_devices');
    }
};
