<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            LevelSeeder::class,
            SubscribtionSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            SubjectSeeder::class,
            ClassesSeeder::class,
            ExamSeeder::class,
            StdSubSeeder::class,
            QuestionsSeeder::class,
            StdClassSeeder::class,
            QuestionOptionsSeeder::class,
            StdAnswersSeeder::class,
            StdGradeSeeder::class,
        ]);
    }
}