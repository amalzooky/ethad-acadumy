<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHonoraryBoardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('honorary_boards', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("image");
            $table->integer("marker");
            $table->string("year");
            $table->string("interview_url")->nullable();
            $table->string("university");
            $table->string("major");
            $table->integer("is_active")->default(1);
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
        Schema::dropIfExists('honorary_boards');
    }
}
