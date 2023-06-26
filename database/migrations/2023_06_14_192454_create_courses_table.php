<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('course_duration')->nullable();
            $table->string('routine_id')->nullable();
            $table->date('course_starting_date')->nullable();
            $table->date('course_end_date')->nullable();
            $table->string('status')->nullable()->comment('running,completed');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
