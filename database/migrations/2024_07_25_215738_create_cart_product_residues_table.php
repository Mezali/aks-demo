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
        Schema::create('cart_product_residues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('residue_id')->constrained();
            $table->foreignId('cart_product_id')->constrained();
            $table->unique(['residue_id', 'cart_product_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_product_residues');
    }
};
