<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('semesters')->insert(array(
            [
                'name'=>'1st'
            ],
            [
                'name'=>'2nd'
            ],
            [
                'name'=>'3rd'
            ],
            [
                'name'=>'4th'
            ],
            [
                'name'=>'5th'
            ],
            [
                'name'=>'6th'
            ],
            [
                'name'=>'7th'
            ],
            [
                'name'=>'8th'
            ],
        ));
    }
}
