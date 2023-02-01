<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscribtionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribtions')->insert([
            'subscribtion_plan' => 'monthly'
        ]);
        DB::table('subscribtions')->insert([
            'subscribtion_plan' => 'half year'
        ]);
        DB::table('subscribtions')->insert([
            'subscribtion_plan' => 'year'
        ]);
        //
        //
    }
}