<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('teacher__ranks')->insert(
            array(
                [
                    "name" => "Instructor",
                ],
                [
                    "name" => "JR. Instructor",
                ]
            )
        );
    }
}
