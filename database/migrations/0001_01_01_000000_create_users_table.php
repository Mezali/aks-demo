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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('name');
            $table->enum('document_type', ['cpf', 'cnpj'])->default('cpf');
            $table->string('document_number')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');            
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('secondary_email')->nullable();
            $table->dateTime('last_login_at')->nullable();
            $table->string('fantasy_name')->nullable();
            $table->string('state_registration')->nullable();
            $table->string('municipal_registration')->nullable();
            $table->string('responsible_name')->nullable();
            $table->string('responsible_document')->nullable();
            $table->string('responsible_office')->nullable();
            $table->string('responsible_departament')->nullable();
            $table->string('responsible_phone')->nullable();
            $table->string('responsible_email')->nullable();
            $table->string('responsible_secondary_phone')->nullable();
            $table->string('responsible_secondary_email')->nullable();
            $table->string('description')->nullable();
            $table->string('cnh')->nullable();
            $table->date('cnh_expiration_date')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
