<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(['name' => 'رام الله']);
        DB::table('cities')->insert(['name' => 'نابلس']);
        DB::table('cities')->insert(['name' => 'القدس']);
        DB::table('cities')->insert(['name' => 'الخليل']);
        DB::table('cities')->insert(['name' => 'قلقيلية']);
        DB::table('cities')->insert(['name' => 'طوباس']);
        DB::table('cities')->insert(['name' => 'سلفيت']);
        DB::table('cities')->insert(['name' => 'أريحا']);
        DB::table('cities')->insert(['name' => 'بيت لحم']);
        DB::table('cities')->insert(['name' => 'جنين']);
    }
}
