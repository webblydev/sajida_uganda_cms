<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApproachItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approach_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('approach_id')->unsigned()->nullable();
            $table->foreign('approach_id')->references('id')->on('approaches');

            $table->string('content_title');
            
            $table->text('description');

            $table->text('image');
            
            $table->text('summary')->nullable();

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
        Schema::dropIfExists('approach_items');
    }
}
