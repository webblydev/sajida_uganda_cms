<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpactModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impact_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            // imapct_1 title
            $table->string('impact_1_title')->nullable();
            // imapct_1 count
            $table->string('impact_1_count')->nullable();
            // imapct_2 title
            $table->string('impact_2_title')->nullable();
            // imapct_2 count
            $table->string('impact_2_count')->nullable();
             // imapct_3 title
             $table->string('impact_3_title')->nullable();
             // imapct_3 count
             $table->string('impact_3_count')->nullable();
             // imapct_4 title
             $table->string('impact_4_title')->nullable();
             // imapct_4 count
             $table->string('impact_4_count')->nullable();
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
        Schema::dropIfExists('impact_models');
    }
}
