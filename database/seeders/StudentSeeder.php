<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'student_name' => 'mostafa monther mostafa swaisy',
            'student_email' => 'mostafa@gmail.com',
            'student_dob' => '1999-8-28',
            'gender' => '0',
            'level_id'=>'1'
        ]);
        DB::table('students')->insert([
            'student_name' => 'abed monther mostafa swaisy',
            'student_email' => 'abed@gmail.com',
            'student_dob' => '1999-8-28',
            'gender' => '0',
            'level_id'=>'2'
        ]);
        DB::table('students')->insert([
            'student_name' => 'mohammed monther mostafa swaisy',
            'student_email' => 'mohammed@gmail.com',
            'student_dob' => '1999-8-28',
            'gender' => '0',
            'level_id'=>'2'
        ]);
    }
}