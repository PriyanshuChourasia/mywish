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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->nullable();
            $table->bigInteger('subject_id')->nullable();
            $table->string('admission_fees')->nullable();
            $table->string('monthly_fees')->nullable();
            $table->date('paid_date')->nullable();
            $table->date('registration_date')->nullable();
            $table->string('month')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('total_amount')->nullable();
            $table->date('next_fees_date')->nullable();
            $table->string('status')->nullable();
            $table->string('due_amount')->nullable();
            $table->date('due_paid_date')->nullable();
            $table->string('payment_image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
