<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatchingRecordedCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watching_recorded_counters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('virtual_classroom_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->string('wiziq_counter')->default(0);
            $table->string('webinar_counter')->default(0);
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
        Schema::dropIfExists('watching_recorded_counters');
    }
}
