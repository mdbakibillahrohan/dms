<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert(
            array(
                [
                    'id' => 1,
                    'name' => 'Student',
                    'class' => 'fas fa-user-graduate'
                ],
                [
                    'id' => 2,
                    'name' => 'Session',
                    'class' => 'fas fa-calendar-alt'
                ],
                [
                    'id' => 3,
                    'name' => 'Teacher',
                    'class' => 'fas fa-user-alt'
                ],
                [
                    'id' => 4,
                    'name' => 'Subject',
                    'class' => 'fas fa-book'
                ],
                [
                    'id' => 5,
                    'name' => 'Menu',
                    'class' => 'fas fa-book'
                ],
            )
        );
    }
}
