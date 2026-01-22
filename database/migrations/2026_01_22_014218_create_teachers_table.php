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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            // Foreign Keys
            $table->foreignId('title_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('ethnicity_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('gender_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('religion_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('district_id')->constrained('education_zone')->cascadeOnUpdate();
            $table->foreignId('school_id')->constrained('school')->cascadeOnUpdate();
            $table->foreignId('civil_status_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('teacher_status_id')->constrained()->cascadeOnUpdate();

            // Personal Info
            $table->string('full_name');
            $table->string('name_with_initials');
            $table->string('nic')->unique();
            $table->date('dob');

            // Contact
            $table->string('email');
            $table->string('phone');

            // Address
            $table->text('address_permanent');
            $table->text('address_temporary')->nullable();

            // Location
            $table->string('ds_division');
            $table->string('gs_division');

            // Family
            $table->string('spouse_name')->nullable();
            $table->text('children_names')->nullable();
            $table->text('children_dobs')->nullable();

            // Qualifications
            $table->string('ncoe')->nullable();
            $table->string('degree')->nullable();
            $table->string('al')->nullable();
            $table->string('diploma')->nullable();
            $table->string('other')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
