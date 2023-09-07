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
        Schema::create('patient_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('patient_id')->nullable();
            $table->unsignedBigInteger('patient_age')->nullable();
            $table->unsignedBigInteger('patient_days')->nullable();
            $table->unsignedBigInteger('patient_weeks')->nullable();
            $table->unsignedBigInteger('patient_months')->nullable();
            $table->unsignedBigInteger('patient_years')->nullable();
            $table->double('temperature')->nullable();
            $table->double('weight')->nullable();
            $table->double('height')->nullable();
            $table->string('kin_full_name')->nullable();
            $table->string('kin_gender')->nullable();
            $table->string('patient_relation')->nullable();
            $table->string('kin_phone_number')->nullable();
            $table->text('kin_residence');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_visits');
    }
};
