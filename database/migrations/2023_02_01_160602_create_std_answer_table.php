<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('std_answers', function (Blueprint $table) {
            $table->id();
            $table->json('student_answer')->nullable();
            $table->integer('student_mark')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('exam_id')->nullable();
            $table->boolean('isDelete')->default(0);
            $table->timestamps();
            $table->foreign('student_id')->references('student_id')->on('students')->nullOnDelete();
            $table->foreign('exam_id')->references('id')->on('exams')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('std_answer');
    }
};