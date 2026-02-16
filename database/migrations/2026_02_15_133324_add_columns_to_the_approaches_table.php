<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTheApproachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('approaches', function (Blueprint $table) {
            //description, link, type, image
             $table->text('description')->nullable()->after('title');
             $table->string('link')->nullable()->after('description');
             $table->string('type')->nullable()->after('link');
             $table->string('image')->nullable()->after('type');
        });
        // top sliders table
        Schema::table('top_sliders', function (Blueprint $table) {
            $table->text('title')->nullable()->after('id');
        });
        Schema::table('top_banners', function (Blueprint $table) {
            $table->text('description')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('approaches', function (Blueprint $table) {
                $table->dropColumn('description');
                $table->dropColumn('link');
                $table->dropColumn('type');
                $table->dropColumn('image');
        });
        
        Schema::table('top_sliders', function (Blueprint $table) {
            $table->dropColumn('title');
        });
    }
}
