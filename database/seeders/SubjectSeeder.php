<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'subject_name' => 'java 1',
            'level_id' => '1'
        ]);
        DB::table('subjects')->insert([
            'subject_name' => 'quran 1',
            'level_id' => '1'
        ]);
        DB::table('subjects')->insert([
            'subject_name' => 'arabic lang',
            'level_id' => '1'
        ]);
        DB::table('subjects')->insert([
            'subject_name' => 'java 2',
            'level_id' => '2'
        ]);
        DB::table('subjects')->insert([
            'subject_name' => 'Android ',
            'level_id' => '2'
        ]);
    }
}