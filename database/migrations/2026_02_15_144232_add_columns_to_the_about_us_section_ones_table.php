<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTheAboutUsSectionOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_us_section_ones', function (Blueprint $table) {
            $table->string('button_one_text')->nullable()->after('description');
            $table->string('button_one_link')->nullable()->after('button_one_text');
            $table->string('button_two_text')->nullable()->after('button_one_link');
            $table->string('button_two_link')->nullable()->after('button_two_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_us_section_ones', function (Blueprint $table) {
            $table->dropColumn('button_one_text');
            $table->dropColumn('button_one_link');
            $table->dropColumn('button_two_text');
            $table->dropColumn('button_two_link');
        });
    }
}
