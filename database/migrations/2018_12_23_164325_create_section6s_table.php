<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSection6sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section6s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category1_id');
            $table->string('banner1Url');
            $table->string('product1List');
            $table->integer('category2_id');
            $table->string('banner2Url');
            $table->string('product2List');
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
        Schema::dropIfExists('section6s');
    }
}
