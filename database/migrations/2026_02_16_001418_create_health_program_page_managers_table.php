<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthProgramPageManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_program_page_managers', function (Blueprint $table) {
            $table->id();
            $table->string('section_2')->nullable();
            $table->string('section_3')->nullable();
            $table->string('section_4')->nullable();
            $table->timestamps();
        });
        // insert default data
        DB::table('health_program_page_managers')->insert([
            'section_2' => 1,
            'section_3' => 1,
            'section_4' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('health_program_page_managers');
    }
}
