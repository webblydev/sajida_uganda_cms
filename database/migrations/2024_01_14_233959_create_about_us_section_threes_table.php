<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsSectionThreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_section_threes', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->text('image');

            $table->string('description');
            $table->string('description_two')->nullable();
            $table->string('description_three')->nullable();
            
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
        Schema::dropIfExists('about_us_section_threes');
    }
}
