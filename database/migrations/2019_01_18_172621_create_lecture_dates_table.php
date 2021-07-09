<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectureDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("subject_id")->unsigned();
            $table->string("sunday")->nullable();
            $table->string("monday")->nullable();
            $table->string("tuesday")->nullable();
            $table->string("wednesday")->nullable();
            $table->string("thursday")->nullable();
            $table->string("friday")->nullable();
            $table->string("saturday")->nullable();
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
        Schema::dropIfExists('subject_dates');
    }
}
