<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiddleBannerItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('middle_banner_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('middle_banner_id')->unsigned()->nullable();
            $table->foreign('middle_banner_id')->references('id')->on('middle_banners');

            $table->string('country_name');
            
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
        Schema::dropIfExists('middle_banner_items');
    }
}
