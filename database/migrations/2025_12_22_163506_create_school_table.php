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
        Schema::create('school', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->string('census_number');
            $table->string('school_id');
            $table->integer('phone_number');
            $table->date('payment_start');
            $table->date('payment_expire');
            $table->foreignId('division_id')->constrained('education_division');
            $table->foreignId('school_type')->constrained('school_type');
            $table->foreignId('school_status')->constrained('status');
            $table->foreignId('payment_id')->constrained('payment_plan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school');
    }
};
