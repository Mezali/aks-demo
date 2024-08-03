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
        Schema::create('order_location_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_locations_id')->constrained()->noActionOnDelete();
            $table->string('productable_type');
            $table->integer('productable_id');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->datetime('location_date')->nullable();
            $table->datetime('withdraw_date')->nullable();
            $table->date('delivery_location_date')->nullable();
            $table->date('delivery_withdrawl_date')->nullable();
            $table->date('final_data')->nullable();
            $table->unsignedBigInteger('withdraw_driver_id')->nullable();
            $table->unsignedBigInteger('withdraw_vehicle_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('vehicle_id')->nullable()->constrained()->noActionOnDelete();
            $table->foreign('driver_id')->references('id')->on('users')->noActionOnDelete();
            $table->foreign('withdraw_driver_id')->references('id')->on('users')->noActionOnDelete();
            $table->foreign('withdraw_vehicle_id')->references('id')->on('vehicles')->noActionOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_location_products');
    }
};
