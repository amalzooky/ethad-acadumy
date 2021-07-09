<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            UserSeeder::class,
            PermissionsSeeder::class,
            SettingsTableSeeder::class,
            CitiesTableSeeder::class,
            // MajorsTableSeeder::class,
            // AcademicYearsTableSeeder::class,
            // SubjectsTableSeeder::class,
            // TeachersTableSeeder::class,
            // LatestnewsTableSeeder::class
         ]);
    }
}
 