<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Carbon\Traits\Date;
use Faker\Provider\cs_CZ\DateTime;
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
            'dob' => Carbon::now(),
            'contact_number' => "019191919",
            "username" => "rohan2001",
            'gender_id' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
