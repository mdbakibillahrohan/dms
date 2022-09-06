<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProbidhanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('probidhans')->insert(
            array(
                [
                    'probidhan_name' => "2010"
                ],
                [
                    'probidhan_name' => "2016"
                ],
                [
                    'probidhan_name' => "2022"
                ]
            )
        );
    }
}
