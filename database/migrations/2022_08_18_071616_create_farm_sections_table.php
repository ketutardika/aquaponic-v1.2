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
        Schema::create('farm_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_name', 40);
            $table->string('section_type', 40)->nullable();
            $table->text('section_description')->nullable();         
            $table->integer('farm_id')->nullable();
            $table->string('sensor_devices', 200)->nullable();
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
        Schema::dropIfExists('farm_sections');
    }
};
