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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uid')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('sid')->nullable()->constrained('users')->nullOnDelete();
            $table->integer('s_amount');
            $table->integer('platform_fees');
            $table->integer('total_amount');
            $table->enum('method', ['upi', 'net banking']);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
