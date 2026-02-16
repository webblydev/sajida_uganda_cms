<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsToTheAboutUsSectionTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_us_section_twos', function (Blueprint $table) {
            //change column image to images
            $table->renameColumn('image', 'images');
            // title chage to nullable
            $table->string('title')->nullable()->change();
            // description change to nullable
            $table->text('description')->nullable()->change();
        });
        Schema::table('about_us_section_threes', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_us_section_twos', function (Blueprint $table) {
            //
        });
    }
}
