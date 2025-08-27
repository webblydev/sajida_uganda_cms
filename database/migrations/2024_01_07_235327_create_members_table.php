<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('member_type_id')->unsigned()->nullable();
            $table->foreign('member_type_id')->references('id')->on('member_types');

            $table->integer('member_category_id')->unsigned()->nullable();
            $table->foreign('member_category_id')->references('id')->on('member_categories');
            
            $table->text('member_name');
            $table->text('member_image');

            $table->integer('order_no')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
