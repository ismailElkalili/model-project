<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            'class_name' => '101',
            'state' => '0',
            'teacher_id' => '1',
            'subject_id' => '1'
        ]);
        DB::table('classes')->insert([
            'class_name' => '102',
            'state' => '0',
            'teacher_id' => '2',
            'subject_id' => '2'
        ]);
        //
    }
}