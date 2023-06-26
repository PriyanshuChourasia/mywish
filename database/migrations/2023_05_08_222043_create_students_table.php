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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('contact_no');
            $table->string('gender')->nullable();
            $table->string('alt_contact')->nullable();
            $table->string('parents_name');
            $table->string('address');
            $table->string('education');
            $table->string('profile_image')->nullable();
            $table->string('document_image')->nullable();
            $table->string('status')->default('active')->comment('active,deactive');
            $table->rememberToken();
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
