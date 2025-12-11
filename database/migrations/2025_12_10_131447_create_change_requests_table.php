<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('change_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agen_id')->constrained('agens')->onDelete('cascade');
            $table->enum('type', ['profile', 'product_add', 'product_edit', 'product_delete']);
            $table->string('title');
            $table->text('description');
            $table->json('requested_data')->nullable(); // Data yang diminta untuk diubah
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
            
            $table->index(['agen_id', 'status']);
            $table->index(['status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('change_requests');
    }
};