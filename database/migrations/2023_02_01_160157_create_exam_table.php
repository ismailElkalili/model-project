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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name');
            $table->string('exam_type');
            $table->dateTime('exam_duration');
            $table->boolean('exam_state');
            $table->unsignedBigInteger('class_id')->nullable();
            $table->boolean('isDelete')->default(0);
            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('classes')->nullOnDelete();
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
};