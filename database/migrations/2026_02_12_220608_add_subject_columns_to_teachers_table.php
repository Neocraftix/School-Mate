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
        Schema::table('teachers', function (Blueprint $table) {
            $table->string('appointed_subject')->nullable()->after('children_dobs');
            $table->string('most_teaching_subject_01')->nullable()->after('appointed_subject');
            $table->string('most_teaching_subject_02')->nullable()->after('most_teaching_subject_01');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn([
                'appointed_subject',
                'most_teaching_subject_01',
                'most_teaching_subject_02'
            ]);
        });
    }
};
