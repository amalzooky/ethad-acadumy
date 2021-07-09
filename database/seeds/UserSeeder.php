<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            "full_name"=>"Owner",
            "password"=>Hash::make("123456"),
            "email"=>"admin@gmail.com",
            "username"=>"owner",
            "is_active"=>true,
            "date_of_birth"=>"1995-12-20",
            "city_id"=>1,
            "mobile_number"=>"0778480862",
            "sex"=>1
        ]);
    }
}
