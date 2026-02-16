<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsToTheMiddleBannerItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('middle_banner_items', function (Blueprint $table) {
            //country_image, link
             $table->string('country_image')->nullable()->after('country_name');
             $table->string('link')->nullable()->after('country_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('middle_banner_items', function (Blueprint $table) {
            $table->dropColumn('country_image');
            $table->dropColumn('link');
        });
    }
}
