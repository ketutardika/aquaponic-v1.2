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
        Schema::create('setting_generals', function (Blueprint $table) {
            $table->id();
            $table->string('general_title', 40);
            $table->string('general_tagline', 255)->nullable();
            $table->text('general_description')->nullable();
            $table->string('general_email', 50)->nullable();
            $table->string('general_phone', 50)->nullable();
            $table->string('general_theme', 50)->nullable();            
            $table->string('general_logo', 255)->nullable();
            $table->string('general_favicon', 255)->nullable();
            $table->string('general_language', 50)->nullable();
            $table->string('general_timezone', 50)->nullable();
            $table->string('general_date_format', 50)->nullable();
            $table->string('general_time_format', 50)->nullable();
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
        Schema::dropIfExists('setting_generals');
    }
};
