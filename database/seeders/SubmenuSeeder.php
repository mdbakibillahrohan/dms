<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmenuSeeder extends Seeder
{
    /**
     * Run tahe database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('submenus')->insert(
            array(
                [
                    'menu_id' => 1,
                    'name' => 'Add Student',
                    'route' => 'student.add'
                ],
                [
                    'menu_id' => 1,
                    'name' => 'All Students',
                    'route' => "student.list"
                ],
                [
                    'menu_id' => 2,
                    'name' => 'All Sessions',
                    'route' => "session.list"
                ],
                [
                    'menu_id' => 2,
                    'name' => 'Add Session',
                    'route' => "session.list"
                ],
            )
        );
    }
}
