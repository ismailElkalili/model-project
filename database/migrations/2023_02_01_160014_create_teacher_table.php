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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->date('Dob');
            $table->boolean('gender');
            $table->string('teacher_image')->nullable();
            $table->string('qualification')->nullable();
            $table->bigInteger('teacher_phone_number')->nullable();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->boolean('isDelete')->default(0);
            $table->timestamps();
            //foreign key
            $table->foreign('level_id')->references('id')->on('levels')->nullOnDelete();
            $table->foreign('teacher_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};