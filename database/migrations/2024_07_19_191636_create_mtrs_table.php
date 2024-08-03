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
        Schema::create('mtrs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_location_product_id')->nullable();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('vehicle_id')->nullable();            
            $table->string('status')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('order_location_product_id')->references('id')->on('order_location_products')->noActionOnDelete();
            $table->foreign('driver_id')->references('id')->on('users')->noActionOnDelete();
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->noActionOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mtrs');
    }
};
