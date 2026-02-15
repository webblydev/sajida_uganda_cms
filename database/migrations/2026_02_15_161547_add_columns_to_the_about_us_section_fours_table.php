<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTheAboutUsSectionFoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_us_section_fours', function (Blueprint $table) {
            // content_one_title, content_one_description, content_one_image, content_two_title, content_two_description, content_two_image
            $table->string('content_one_title')->nullable()->after('title');
            $table->text('content_one_description')->nullable()->after('content_one_title');
            $table->string('content_one_image')->nullable()->after('content_one_description');

            $table->string('content_two_title')->nullable()->after('content_one_image');
            $table->text('content_two_description')->nullable()->after('content_two_title');
            $table->string('content_two_image')->nullable()->after('content_two_description');

            // description turn to nullable
            $table->text('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_us_section_fours', function (Blueprint $table) {
            $table->dropColumn('content_one_title');
            $table->dropColumn('content_one_description');
            $table->dropColumn('content_one_image');

            $table->dropColumn('content_two_title');
            $table->dropColumn('content_two_description');
            $table->dropColumn('content_two_image');

            // description turn to not nullable
            $table->text('description')->nullable(false)->change();
        });
    }
}
