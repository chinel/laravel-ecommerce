<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSection4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section4s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('brandlist');
            $table->string('bannerUrl');
            $table->integer('subcategory1');
            $table->integer('subcategory2');
            $table->integer('subcategory3');
            $table->integer('subcategory4');
            $table->integer('subcategory5');
            $table->string('subcategory1_childlist');
            $table->string('subcategory2_childlist');
            $table->string('subcategory3_childlist');
            $table->string('subcategory4_childlist');
            $table->string('subcategory5_childlist');
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
        Schema::dropIfExists('section4s');
    }
}
