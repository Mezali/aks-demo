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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_from_id');
            $table->integer('user_to_id');
            $table->text('message');
            $table->string('url')->nullable();
            $table->string('color')->nullable();
            $table->enum('status', ['unread', 'read', 'archived'])->default('unread');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nofitications');
    }
};
