<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSection5sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section5s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banner1Url');
            $table->integer('banner1CategoryId');
            $table->string('banner2Url');
            $table->integer('banner2CategoryId');
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
        Schema::dropIfExists('section5s');
    }
}
