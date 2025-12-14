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
        // Migrate existing data to pivot table before removing column
        $this->migrateExistingData();
        
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['agen_id']);
            $table->dropColumn('agen_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('agen_id')->nullable()->constrained('agens')->onDelete('set null');
        });
    }
    
    /**
     * Migrate existing product-agen relationships to pivot table
     */
    private function migrateExistingData()
    {
        $products = \DB::table('products')->whereNotNull('agen_id')->get();
        
        foreach ($products as $product) {
            \DB::table('agen_product')->insert([
                'agen_id' => $product->agen_id,
                'product_id' => $product->id,
                'urutan' => $product->urutan ?? 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
};
