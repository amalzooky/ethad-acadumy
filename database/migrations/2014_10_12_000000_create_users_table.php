<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_active')->default(false);
            $table->tinyInteger('sex');
            $table->date('date_of_birth')->nullable();
            $table->string('full_name')->unique();
            $table->integer('city_id')->unsigned();
            $table->string('mobile_number');
            $table->string('telephone_number')->nullable();
            $table->string('avatar')->nullable()->default("/dashboard/assets/imgs/avatar-default.jpg");
            $table->string('facebook_url')->unique()->nullable();
            $table->string('logins')->default(0);
            $table->ipAddress('last_ip')->nullable();
            $table->timestamp("last_login")->nullable();
            $table->timestamp('active_date')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
