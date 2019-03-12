<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSideBarBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('side_bar_banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banner1');
            $table->string('banner1Url');
            $table->string('banner2');
            $table->string('banner2Url');
            $table->string('banner3');
            $table->string('banner3Url');
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
        Schema::dropIfExists('side_bar_banners');
    }
}
