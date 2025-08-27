<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_sliders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('news_category_id')->unsigned()->nullable();
            $table->foreign('news_category_id')->references('id')->on('news_categories');

            $table->string('title');
            
            $table->string('link')->nullable();
            
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
        Schema::dropIfExists('news_sliders');
    }
}
