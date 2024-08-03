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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->index();
            $table->string('event_id')->nullable();
            $table->string('event_type')->nullable();
            $table->string('event_date_created')->nullable();
            $table->string('object');
            $table->string('asaas_id');
            $table->string('customer');
            $table->string('payment_link')->nullable();
            $table->date('due_date')->nullable();
            $table->decimal('value', 10, 2)->nullable();
            $table->decimal('net_value', 10, 2)->nullable();
            $table->string('billing_type');
            $table->boolean('can_be_paid_after_due_date')->nullable();
            $table->string('pix_transaction')->nullable();
            $table->string('status');
            $table->string('description')->nullable();
            $table->string('external_reference')->nullable(); // order_id
            $table->decimal('original_value', 10, 2)->nullable();
            $table->decimal('interest_value', 10, 2)->nullable();
            $table->date('original_due_date')->nullable();
            $table->date('payment_date')->nullable();
            $table->date('client_payment_date')->nullable();
            $table->integer('installment_number')->nullable();
            $table->string('transaction_receipt_url')->nullable();
            $table->string('nosso_numero')->nullable();
            $table->string('invoice_url')->nullable();
            $table->string('bank_slip_url')->nullable();
            $table->string('invoice_number')->nullable();
            $table->json('discount')->nullable();
            $table->json('fine')->nullable();
            $table->json('interest')->nullable();
            $table->boolean('deleted')->nullable();
            $table->boolean('postal_service')->nullable();
            $table->boolean('anticipated')->nullable();
            $table->boolean('anticipable')->nullable();
            $table->json('refunds')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('order_id')->references('id')->on('orders')->noActionOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
