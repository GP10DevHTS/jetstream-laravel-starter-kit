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
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('patient_id')->nullable();
            $table->foreignId('lab_service_id');
            $table->string('order_number')->nullable();
            $table->integer('lab_service_price')->nullable();
            $table->string('payment_status')->default('unpaid');
            $table->string('order_status')->default('submitted');
            $table->dateTime('order_received_date')->nullable();
            $table->dateTime('sample_collection_date')->nullable();
            $table->dateTime('sample_received_date')->nullable();
            $table->dateTime('sample_test_date')->nullable();
            $table->foreignId('result_option_id')->nullable();
            $table->string('test_identity')->nullable();
            $table->foreignId('staff_id')->nullable();
            $table->string('result_status')->nullable('In progress');
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_results');
    }
};
