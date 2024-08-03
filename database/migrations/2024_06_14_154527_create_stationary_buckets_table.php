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
        Schema::create('stationary_buckets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stationary_bucket_group_id')->constrained()->noActionOnDelete();
            $table->foreignId('user_id')->constrained()->noActionOnDelete();
            $table->string('code');
            $table->enum('status', ['D', 'EP', 'L', 'AR', 'MC', 'ETL', 'ETR'])->default('D');
            $table->unique(['code', 'user_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stationary_buckets');
    }
};
