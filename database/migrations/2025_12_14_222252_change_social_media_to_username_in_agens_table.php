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
            // Rename existing URL columns to username columns
            $table->renameColumn('instagram_url', 'instagram_username');
            $table->renameColumn('facebook_url', 'facebook_username');
            $table->renameColumn('linkedin_url', 'linkedin_username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agens', function (Blueprint $table) {
            // Rename back to URL columns
            $table->renameColumn('instagram_username', 'instagram_url');
            $table->renameColumn('facebook_username', 'facebook_url');
            $table->renameColumn('linkedin_username', 'linkedin_url');
        });
    }
};
