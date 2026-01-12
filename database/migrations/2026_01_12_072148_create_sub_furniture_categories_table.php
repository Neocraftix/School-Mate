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
        Schema::create('sub_furniture_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_furniture_category_id')
                ->constrained('main_furniture_categories')
                ->cascadeOnDelete();

            $table->string('category_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_furniture_categories');
    }
};
