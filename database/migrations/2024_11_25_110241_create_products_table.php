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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم المنتج
            $table->string('slug')->unique(); // رابط URL مميز للمنتج
            $table->text('description')->nullable(); // وصف المنتج
            $table->decimal('price', 10, 2); // السعر الأساسي
            $table->boolean('is_featured')->default(false); // هل المنتج مميز؟
            $table->boolean('is_new')->default(false); // هل المنتج جديد؟
            $table->integer('rating')->default(0); // التقييم بين 1 و 5، بدون فواصل
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete(); // التصنيف المرتبط بالمنتج
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
