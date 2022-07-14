<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllSubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('all_sub_menus')->insert(
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
                    'menu_id' => 1,
                    'name' => 'Delete Student',
                    'route' => 'student.Delete'
                ],
                [
                    'menu_id' => 1,
                    'name' => 'Edit Students',
                    'route' => "student.edit"
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
                [
                    'menu_id' => 2,
                    'name' => 'Delete Session',
                    'route' => "session.delete"
                ],
                [
                    'menu_id' => 2,
                    'name' => 'Edit Session',
                    'route' => "session.edit"
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
                    'route' => "teacher.list"
                ],
                [
                    'menu_id' => 3,
                    'name' => 'Delete Teacher',
                    'route' => "teacher.delete"
                ],
                [
                    'menu_id' => 3,
                    'name' => 'Edit Teacher',
                    'route' => "teacher.edit"
                ],



                // here menu_id 4 started
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
                    'menu_id' => 4,
                    'name' => 'Delete Subject',
                    'route' => "subject.delete"
                ],
                [
                    'menu_id' => 4,
                    'name' => 'Edit Subject',
                    'route' => "subject.edit"
                ],


            )
        );
    }
}
