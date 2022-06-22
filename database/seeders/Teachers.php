<?php

namespace Database\Seeders;

use Carbon\Traits\Date;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Teachers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'name' => "Rohan Teacher",
            'email' => 'rohanteacher@gmail.com',
            'dob'=>date('dMY'),
            'password' => Hash::make('password'),
        ]);
    }
}
