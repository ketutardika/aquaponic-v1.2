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
        Schema::create('crop_records', function (Blueprint $table) {
            $table->id();                 
            $table->float('width')->nullable();
            $table->float('height')->nullable();
            $table->string('color')->nullable();
            $table->string('condition')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('crop_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('crop_id')->references('id')->on('crops');
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crop_records');
    }
};
