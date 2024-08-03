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
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('sales_amount', 15, 2)->default(0);
            $table->decimal('total_fees', 15, 2)->default(0);
            $table->decimal('net_total', 15, 2)->default(0);
            $table->decimal('total_withdrawn', 15, 2)->default(0);
            $table->decimal('total_balance', 15, 2)->default(0);
            $table->decimal('blocked_balance', 15, 2)->default(0);
            $table->decimal('available_balance', 15, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'sales_amount',
                'total_fees',
                'net_total',
                'total_withdrawn',
                'total_balance',
                'blocked_balance',
                'available_balance',
            ]);
        });
    }
};
