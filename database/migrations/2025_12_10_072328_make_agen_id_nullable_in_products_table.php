<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['agen_id']);
            $table->foreignId('agen_id')->nullable()->change()->constrained('agens')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['agen_id']);
            $table->foreignId('agen_id')->nullable(false)->change()->constrained('agens')->onDelete('cascade');
        });
    }
};