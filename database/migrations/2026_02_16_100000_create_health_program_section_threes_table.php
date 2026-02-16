<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthProgramSectionThreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_program_section_threes', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->default('Impacts Made');
            $table->string('stat_one_number')->nullable();
            $table->text('stat_one_description')->nullable();
            $table->string('stat_two_number')->nullable();
            $table->text('stat_two_description')->nullable();
            $table->string('stat_three_number')->nullable();
            $table->text('stat_three_description')->nullable();
            $table->string('stat_four_number')->nullable();
            $table->text('stat_four_description')->nullable();
            $table->string('stat_five_number')->nullable();
            $table->text('stat_five_description')->nullable();
            $table->string('background_image')->nullable();
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
        Schema::dropIfExists('health_program_section_threes');
    }
}
