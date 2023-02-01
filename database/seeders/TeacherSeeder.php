<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'teacher_name' => 'ismail elkhalili',
            'teacher_email' => 'ismail@gmail.com',
            'Dob' => '1999-10-14',
            'gender' => '0',
            'level_id' => '1'
        ]);
        DB::table('teachers')->insert([
            'teacher_name' => 'saed el hattab',
            'teacher_email' => 'saed@gmail.com',
            'Dob' => '1999-10-14',
            'gender' => '1',
            'level_id' => '2'
        ]);
        DB::table('teachers')->insert([
            'teacher_name' => 'ayham hamdan',
            'teacher_email' => 'ayham@gmail.com',
            'Dob' => '1999-10-14',
            'gender' => '2',
            'level_id' => '1'
        ]);
        //
    }
}