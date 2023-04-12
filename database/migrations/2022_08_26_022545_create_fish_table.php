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
        Schema::create('fish', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->string('fish_name', 40);
            $table->string('habitat', 40);
            $table->integer('qty_fish')->nullable();
            $table->integer('average_weight')->nullable();
            $table->integer('growth_weeks')->nullable();
            $table->integer('harvest_weight')->nullable();
            $table->integer('daily_feeding_rate')->nullable();            
            $table->text('fish_description')->nullable();         
            $table->integer('min_air_temperature')->nullable();
            $table->integer('max_air_temperature')->nullable();
            $table->integer('min_humidity')->nullable();
            $table->integer('max_humidity')->nullable();
            $table->integer('min_turbidity')->nullable();
            $table->integer('max_turbidity')->nullable();
            $table->integer('min_tds')->nullable();
            $table->integer('max_tds')->nullable();
            $table->integer('min_water_temperature')->nullable();
            $table->integer('max_water_temperature')->nullable();
            $table->integer('min_ph')->nullable();
            $table->integer('max_ph')->nullable();
            $table->integer('min_width')->nullable();
            $table->integer('max_width')->nullable();
            $table->integer('min_height')->nullable();
            $table->integer('max_height')->nullable();
            $table->integer('min_fcr')->nullable();
            $table->integer('max_fcr')->nullable();
            $table->integer('min_protein')->nullable();
            $table->integer('max_protein')->nullable();
            $table->integer('min_dissolved_oxygen')->nullable();
            $table->integer('max_dissolved_oxygen')->nullable();
            $table->string('growing')->nullable();
            $table->string('harvesting')->nullable();
            $table->text('summary')->nullable();
            $table->integer('user_id')->nullable();            
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('section_id')->references('id')->on('farm_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fish');
    }
};
