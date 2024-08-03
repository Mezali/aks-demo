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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('bank_id')->index();
            $table->boolean('enabled')->default(true);
            $table->boolean('default')->default(false);
            $table->string('agency_number', 5);
            $table->string('agency_vd', 1)->nullable();
            $table->string('account_number', 10);
            $table->string('account_vd', 1);
            $table->enum('account_type', [
                'conta_corrente',
                'conta_poupanca',
                'conta_corrente_conjunta',
                'conta_poupanca_conjunta',
            ]);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
