<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profile_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agen_id')->constrained('agens')->onDelete('cascade');
            $table->string('ip_address');
            $table->string('user_agent')->nullable();
            $table->string('referer')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->timestamp('visited_at');
            $table->timestamps();
            
            $table->index(['agen_id', 'visited_at']);
            $table->index(['ip_address', 'agen_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_visits');
    }
};