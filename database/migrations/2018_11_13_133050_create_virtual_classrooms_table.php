<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVirtualClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_classrooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class_id');
            $table->integer('lecture_id')->unsigned();
            $table->string('title');
            $table->string('acount_name');
            $table->string('start_time');
            $table->string('webinar_end_time');
            $table->text('webinar_description');
            $table->integer('user_id')->unsigned();
            $table->string('recording_url');
            $table->string('presenter_url');
            $table->string('webinar_url');
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
        Schema::dropIfExists('virtual_classrooms');
    }
}
