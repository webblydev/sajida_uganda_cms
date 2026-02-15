<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTheNewsBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_banners', function (Blueprint $table) {
            //description, thumbnail,link change to nullable
            $table->text('description')->nullable()->change();
            $table->string('thumbnail')->nullable()->change();
            $table->string('link')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_banners', function (Blueprint $table) {
            $table->text('description')->nullable(false)->change();
            $table->string('thumbnail')->nullable(false)->change();
            $table->string('link')->nullable(false)->change();
        });
    }
}
