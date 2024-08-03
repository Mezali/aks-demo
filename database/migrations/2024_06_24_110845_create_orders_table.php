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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('provider_id')->index();
            $table->unsignedBigInteger('cart_id')->index();
            $table->decimal('total', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('gateway_cost', 10, 2)->default(0);
            $table->decimal('platform_cost', 10, 2)->default(0);
            $table->decimal('net_total', 10, 2)->nullable();
            $table->string('payment_type');
            $table->string('payment_status')->nullable();
            $table->string('status');
            $table->date('payment_date')->nullable();
            $table->string('bank_slip_url')->nullable();
            $table->string('bank_slip_bar_code')->nullable();
            $table->string('bank_slip_expiration_date')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('last_transaction_status')->nullable();
            $table->string('last_transaction_date')->nullable();
            $table->string('last_transaction_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('provider_id')->references('id')->on('users')->noActionOnDelete();
            $table->foreign('client_id')->references('id')->on('users')->noActionOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->noActionOnDelete();
            $table->foreign('cart_id')->references('id')->on('carts')->noActionOnDelete();
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
