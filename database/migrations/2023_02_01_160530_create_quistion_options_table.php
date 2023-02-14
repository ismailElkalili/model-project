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
            $table->json('options')->nullable();
            $table->boolean('right_answer');
            $table->unsignedBigInteger('question_id')->nullable();
            $table->boolean('isDelete')->default(0);
            $table->timestamps();
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