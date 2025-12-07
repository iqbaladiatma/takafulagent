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
        Schema::table('agens', function (Blueprint $table) {
            $table->string('background_image')->nullable()->after('foto');
            $table->string('background_type')->default('gradient')->after('background_image'); // 'image', 'gradient', 'color'
            $table->string('background_value')->default('blue-green')->after('background_type'); // gradient name or color code
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agens', function (Blueprint $table) {
            $table->dropColumn(['background_image', 'background_type', 'background_value']);
        });
    }
};
