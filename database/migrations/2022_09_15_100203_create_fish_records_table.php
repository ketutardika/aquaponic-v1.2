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
        Schema::create('fish_records', function (Blueprint $table) {
            $table->id();                 
            $table->float('width')->nullable();
            $table->float('height')->nullable();
            $table->string('condition')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('fish_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('fish_id')->references('id')->on('fish');
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
        Schema::dropIfExists('fish_records');
    }
};
