<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('agens', function (Blueprint $table) {
            // Statistik Agen
            $table->string('tahun_pengalaman')->default('5+')->after('pencapaian');
            $table->string('klien_terlayani')->default('100+')->after('tahun_pengalaman');
            
            // Layanan Unggulan (JSON array)
            $table->json('layanan_unggulan')->nullable()->after('klien_terlayani');
        });
    }

    public function down(): void
    {
        Schema::table('agens', function (Blueprint $table) {
            $table->dropColumn(['tahun_pengalaman', 'klien_terlayani', 'layanan_unggulan']);
        });
    }
};