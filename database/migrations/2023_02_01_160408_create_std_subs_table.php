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
        Schema::create('student_subuscribtions', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->boolean('state');
            $table->unsignedBigInteger('sub_plan_id')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->boolean('isDelete')->default(0);
            $table->timestamps();
            $table->foreign('sub_plan_id')->references('id')->on('subscribtions')->nullOnDelete();
            $table->foreign('student_id')->references('student_id')->on('students')->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_subuscribtions');
    }
};