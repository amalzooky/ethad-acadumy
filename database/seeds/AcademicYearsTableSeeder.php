<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AcademicYearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academic_years')->insert([
            'name' => '2018/2019',
            'is_active' => 1,
            'user_id' => 1,
            'year' => '2019',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
