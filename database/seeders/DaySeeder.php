<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //It will seed all days in the table
        DB::table('days')->insert(array(
            [
                'day_name' => "Saturday"
            ],
            [
                'day_name' => "Sunday"
            ],
            [
                'day_name' => "Monday"
            ],
            [
                'day_name' => "Tuesday"
            ],
            [
                'day_name' => "Wednesday"
            ],
            [
                'day_name' => "Thursday"
            ],
        ));
    }
}
