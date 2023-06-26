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
        Schema::create('subject_selects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_id');
            $table->string('student_id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('routine_group_id')->nullable();
            $table->string('status')->nullable()->comment('active,requested,completed');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_selects');
    }
};
