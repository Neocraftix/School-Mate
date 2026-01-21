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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('admission_number');
            $table->string('child_name');
            $table->string('full_name_with_initials');
            $table->foreignId('gender_id')->constrained()->cascadeOnUpdate();
            $table->date('date_of_birth');
            $table->foreignId('transport_id')->constrained()->cascadeOnUpdate();
            $table->text('sibling_details')->nullable();
            $table->text('address');
            $table->string('mother_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('guardian_name')->nullable();
            $table->text('guardian_address')->nullable();
            $table->string('telephone_number');
            $table->foreignId('blood_type_id')->constrained()->cascadeOnUpdate();
            $table->text('special_medical_conditions')->nullable();
            $table->foreignId('skill_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('assistance_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('grade_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('student_status_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('school_id')->constrained('school')->cascadeOnUpdate();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
