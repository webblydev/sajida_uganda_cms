<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_managers', function (Blueprint $table) {
            $table->id();
            $table->boolean('section_1')->default(true);
            $table->boolean('section_2')->default(true);
            $table->boolean('section_3')->default(true);
            $table->boolean('section_4')->default(true);
            $table->boolean('section_5')->default(true);
            $table->boolean('section_6')->default(true);
            $table->boolean('section_7')->default(true);
            $table->boolean('section_8')->default(true);
            $table->boolean('section_9')->default(true);
            $table->boolean('section_10')->default(true);
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
        Schema::dropIfExists('home_page_managers');
    }
}
