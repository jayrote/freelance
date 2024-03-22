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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gig_id')->nullable()->constrained('gigs')->nullOnDelete();
            $table->foreignId('uid')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('sid')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('bill_id')->nullable()->constrained('bills')->nullOnDelete();
            $table->timestamps();
            $table->boolean('status')->default(1)->comment('1-Active 0-Inactive');
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
