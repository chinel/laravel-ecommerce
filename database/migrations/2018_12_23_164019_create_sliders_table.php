<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('big_slider1Url');
            $table->integer('big_slider1CategoryId');
            $table->string('big_slider2Url');
            $table->integer('big_slider2categoryId');
            $table->string('big_slider3Url');
            $table->integer('big_slider3CategoryId');
            $table->string('small_slider1Url');
            $table->integer('small_slider1CategoryId');
            $table->string('small_slider2Url');
            $table->integer('small_slider2CategoryId');
            $table->string('small_slider3Url');
            $table->integer('small_slider3CategoryId');
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
        Schema::dropIfExists('sliders');
    }
}
