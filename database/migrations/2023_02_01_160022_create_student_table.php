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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name')->unique();
            $table->string('student_email')->unique();
            $table->string('student_image')->nullable();
            $table->date('student_dob');
            $table->boolean('gender');
            $table->bigInteger('student_phone_number')->nullable();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->timestamps();
            $table->foreign('level_id')->references('id')->on('levels')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};