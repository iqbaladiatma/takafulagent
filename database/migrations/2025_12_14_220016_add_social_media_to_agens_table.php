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
            $table->string('instagram_url')->nullable()->after('wa_link');
            $table->string('facebook_url')->nullable()->after('instagram_url');
            $table->string('linkedin_url')->nullable()->after('facebook_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agens', function (Blueprint $table) {
            $table->dropColumn(['instagram_url', 'facebook_url', 'linkedin_url']);
        });
    }
};
