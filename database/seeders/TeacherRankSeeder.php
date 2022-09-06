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
                    "rank_name" => "Instructor",
                ],
                [
                    "rank_name" => "JR. Instructor",
                ]
            )
        );
    }
}
