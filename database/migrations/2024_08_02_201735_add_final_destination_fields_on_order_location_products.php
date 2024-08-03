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
        Schema::table('order_location_products', function (Blueprint $table) {
            $table->enum('type_destination', ['return_provider', 'go_to_the_final_destination'])->nullable();
            $table->integer('destination_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_location_products', function (Blueprint $table) {
            $table->dropColumn('type_destination');
            $table->dropColumn('destination_id');
        });
    }
};
