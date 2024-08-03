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
        Schema::create('bucket_group_residues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stationary_bucket_group_id')->constrained();
            $table->foreignId('residue_id')->constrained();
            $table->unique(['stationary_bucket_group_id', 'residue_id'], 'unique_bucket_group_id_residue_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bucket_group_residues');
    }
};
