<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryWiseContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_wise_contents', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('member_category_id')->unsigned()->nullable();
            $table->foreign('member_category_id')->references('id')->on('member_categories');
            
            $table->text('image');

            $table->text('description');

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
        Schema::dropIfExists('category_wise_contents');
    }
}
