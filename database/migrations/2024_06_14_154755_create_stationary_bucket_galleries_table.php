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
        Schema::create('stationary_bucket_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stationary_bucket_group_id')->constrained()->noActionOnDelete();
            $table->string('url');
            $table->boolean('is_main')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stationary_bucket_galleries');
    }
};
