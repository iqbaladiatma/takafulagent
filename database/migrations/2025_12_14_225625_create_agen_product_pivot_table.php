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
        Schema::create('agen_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agen_id')->constrained('agens')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('custom_wa_link')->nullable(); // Custom WhatsApp link per agen-produk
            $table->text('custom_description')->nullable(); // Custom deskripsi per agen-produk
            $table->integer('urutan')->default(0); // Urutan produk per agen
            $table->timestamps();
            
            // Unique constraint: satu agen tidak bisa memiliki produk yang sama 2x
            $table->unique(['agen_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agen_product');
    }
};
