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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->string('subject_id');
            $table->string('student_id')->nullable();
            $table->string('seat_number');
            $table->string('booking_date')->nullable();
            $table->string('booking_time')->nullable();
            $table->string('revoke_reason')->nullable();
            $table->string('revoke_time')->nullable();
            $table->string('status')->default(1)->comment('1:active,0:deactive');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
