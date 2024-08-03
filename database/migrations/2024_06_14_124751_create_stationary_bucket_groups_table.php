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
        Schema::create('stationary_bucket_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stationary_bucket_type_id')->constrained()->noActionOnDelete();
            $table->foreignId('user_id')->constrained()->noActionOnDelete();
            $table->string('color');
            $table->string('material');
            $table->double('weight');
            $table->enum('type_lid', ['S', 'A', 'C']);
            $table->enum('type_local', ['I', 'E', 'B'])->default('B');
            $table->double('price_internal')->nullable();
            $table->double('price_external')->nullable();
            $table->integer('days_internal')->default(0);
            $table->integer('days_external')->default(0);
            $table->integer('pending_deliveries')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stationary_bucket_groups');
    }
};
