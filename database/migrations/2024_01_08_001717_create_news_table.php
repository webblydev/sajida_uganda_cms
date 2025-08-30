<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('news_category_id')->unsigned()->nullable();
            $table->foreign('news_category_id')->references('id')->on('news_categories');
            
            $table->string('title');

            $table->text('thumbnail_image');
            $table->text('banner_image');
            $table->text('article_image');

            $table->text('paragraph_one')->nullable();
            $table->text('paragraph_two')->nullable();
            $table->text('paragraph_three')->nullable();

            $table->integer('type')->default(0)->comment('0=recent, 1=featured, 2=special');

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
        Schema::dropIfExists('news');
    }
}
