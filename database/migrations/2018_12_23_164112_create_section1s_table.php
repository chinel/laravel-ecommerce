<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSection1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section1s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('category1');
            $table->integer('category2');
            $table->integer('category3');
            $table->integer('category4');
            $table->integer('category5');
            $table->string('productlist1');
            $table->string('productlist2');
            $table->string('productlist3');
            $table->string('productlist4');
            $table->string('productlist5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('section1s');
    }
}
