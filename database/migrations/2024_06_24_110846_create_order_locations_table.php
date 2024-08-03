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
        Schema::create('order_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreignId('user_id')->constrained()->noActionOnDelete();
            $table->unsignedBigInteger('provider_id');
            $table->foreignId('cart_product_id')->constrained()->noActionOnDelete();
            $table->enum('status', ['AR', 'PA', 'PR', 'PC', 'PP'])->default('AR');           
            $table->foreignId('order_id')->constrained()->noActionOnDelete();
            $table->integer('days');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->foreignId('address_id')->constrained()->noActionOnDelete();
            $table->string('type_local', 1);
            $table->unsignedBigInteger('address_final_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('client_id')->references('id')->on('users')->noActionOnDelete();
            $table->foreign('provider_id')->references('id')->on('users')->noActionOnDelete();        
            $table->foreign('address_final_id')->references('id')->on('addresses')->noActionOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_locations');
    }
};
