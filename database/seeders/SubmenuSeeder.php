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



                // menu id 2 started

                [
                    'menu_id' => 2,
                    'name' => 'All Sessions',
                    'route' => "session.list"
                ],
                [
                    'menu_id' => 2,
                    'name' => 'Add Session',
                    'route' => "session.add"
                ],



                // menu id 3 started
                [
                    'menu_id' => 3,
                    'name' => 'Add Teacher',
                    'route' => "teacher.add"
                ],
                [
                    'menu_id' => 3,
                    'name' => 'All Teacher',
                    'route' => "teacher.all"
                ],


                [
                    'menu_id' => 4,
                    'name' => 'Add Subject',
                    'route' => "subject.create"
                ],
                [
                    'menu_id' => 4,
                    'name' => 'All Subject',
                    'route' => "subject.all"
                ],
                [
                    'menu_id' => 5,
                    'name' => 'All Menu Permissions',
                    'route' => "menu_permission.all"
                ],


            )
        );
    }
}
