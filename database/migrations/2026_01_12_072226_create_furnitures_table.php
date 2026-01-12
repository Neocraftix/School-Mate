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
        Schema::create('furnitures', function (Blueprint $table) {
            $table->id();
            $table->string('furniture_name');
            $table->foreignId('sub_furniture_category_id')
                ->constrained('sub_furniture_categories')
                ->cascadeOnDelete();

            $table->integer('quantity')->default(0);
            $table->string('location');
            $table->date('purchase_date')->nullable();
            $table->string('warranty')->nullable();
            $table->string('supplier')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('furnitures');
    }
};
