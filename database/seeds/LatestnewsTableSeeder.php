<?php

use Illuminate\Database\Seeder;

class LatestnewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Latestnews::class, 50)->create();
    }
}
