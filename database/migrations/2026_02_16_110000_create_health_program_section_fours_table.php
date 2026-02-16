<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthProgramSectionFoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_program_section_fours', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('name')->nullable();
            $table->string('location')->nullable();
            $table->string('image')->nullable();
            $table->integer('order_no')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('health_program_section_fours');
    }
}
