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
        Schema::create('order_location_residues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('residue_id')->constrained();
            $table->foreignId('order_location_id')->constrained();
            $table->unique(['residue_id', 'order_location_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_location_residues');
    }
};
