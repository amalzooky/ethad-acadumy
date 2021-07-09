<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $userID =  DB::table('users')->insertGetId([
            'username' => 'teacher-1',
            'email' => 'teacher1@teachers.com',
            'password' => bcrypt('123456'),
            'is_active' => 1,
            'sex' => 1,
            'date_of_birth' => \Carbon\Carbon::now(),
            'full_name' => 'teacher fullname',
            'city_id' => 1,
            'mobile_number' => "079999999",
            'telephone_number' => "000000000",
            'avatar' => "http://via.placeholder.com/300",
            'facebook_url' => "http://via.placeholder.com/300",
            'logins' => "1",
            'last_ip' => "http://127.0.0.1:8000",
            'last_ip' => "http://127.0.0.1:8000",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $teacherID = DB::table('teachers')->insertGetId([
            'user_id' => $userID,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('subject_teacher')->insert([
            'teacher_id' => $teacherID,
            'subject_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('subject_teacher')->insert([
            'teacher_id' => $teacherID,
            'subject_id' => 2,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);


    }
}
