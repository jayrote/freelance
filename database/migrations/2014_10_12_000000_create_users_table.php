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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique()->nullable();
            $table->string('password');
            $table->string('location')->nullable();
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->string('dob')->nullable();
            $table->enum('type',['Buyer','Seller'])->nullable();
            $table->string('status')->default(1)->comment('1-Active 0-Inactive')->nullable();
            $table->string('aboutMe')->nullable();
            $table->string('skills')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
