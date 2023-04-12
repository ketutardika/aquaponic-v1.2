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
        Schema::create('sensor_configs', function (Blueprint $table) {
            $table->id();
            $table->string('device_id', 20)->nullable();
            $table->float('min_value', 10, 0)->nullable()->default(20);
            $table->float('max_value', 10, 0)->nullable()->default(45);
            $table->bigInteger('read_sensor_time')->nullable();
            $table->bigInteger('send_sensor_time')->nullable();
            $table->bigInteger('deepsleep_time')->nullable()->default(15);
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
        Schema::dropIfExists('sensor_configs');
    }
};
