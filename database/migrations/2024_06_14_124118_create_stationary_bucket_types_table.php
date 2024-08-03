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
        Schema::create('stationary_bucket_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('m3');
            $table->double('letter_a');
            $table->double('letter_b');
            $table->double('letter_c');
            $table->double('letter_d');
            $table->double('letter_e');
            $table->double('letter_f');
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stationary_bucket_types');
    }
};
