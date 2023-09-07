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
        Schema::create('payment_service_providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_method_id')->nullable();
            $table->string('provider_name')->nullable();
            $table->text('api')->nullable();
            $table->text('token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_service_providers');
    }
};
