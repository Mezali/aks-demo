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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->foreignId('vehicle_type_id')->constrained()->restrictOnDelete();
            $table->string('renavam', 20);
            $table->integer('year_manufacture');
            $table->integer('year_model');
            $table->string('brand');
            $table->string('model');
            $table->string('version')->nullable();
            $table->string('fuel');
            $table->string('motor')->nullable();
            $table->double('total_gross_weight', 8, 2)->nullable();
            $table->string('plate');
            $table->double('capacity', 8, 2)->nullable();
            $table->string('axles')->nullable();
            $table->enum('status', ['D', 'R', 'ET'])->default('D');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
