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
        Schema::create('order_location_product_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_location_product_id')->constrained(indexName: 'order_location_product_gallery')->noActionOnDelete();
            $table->string('url');
            $table->string('status', 100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_location_product_galleries');
    }
};
