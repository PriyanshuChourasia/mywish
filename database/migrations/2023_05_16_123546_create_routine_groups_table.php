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
        Schema::create('routine_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name')->unique()->comment('subject_id');
            $table->string('day_one')->nullable();
            $table->string('day_two')->nullable();
            $table->string('day_three')->nullable();
            $table->string('day_four')->nullable();
            $table->string('day_five')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routine_groups');
    }
};
