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
        Schema::create('quistion_options', function (Blueprint $table) {
            $table->id();
            $table->string('op1');
            $table->string('op2');
            $table->string('op3');
            $table->string('op4');
            $table->unsignedBigInteger('exam_id')->nullable();
            $table->unsignedBigInteger('question_id')->nullable();
            $table->boolean('isDelete')->default(0);
            $table->timestamps();
            $table->foreign('exam_id')->references('id')->on('exams')->nullOnDelete();
            $table->foreign('question_id')->references('id')->on('questions')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quistion_options');
    }
};