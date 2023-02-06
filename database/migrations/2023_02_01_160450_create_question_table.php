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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question_text');
            $table->string('right_answer');
            $table->string('question_type');
            $table->integer('question_mark');
            $table->boolean('isDelete')->default(0);
            $table->unsignedBigInteger('exam_id')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('questions');
    }
};