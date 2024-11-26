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
        Schema::create('images', function (Blueprint $table) {
            $table->id(); // الرقم التعريفي للصورة
            $table->string('url'); // رابط الصورة
            $table->string('alt')->nullable(); // النص البديل للصورة (اختياري لتحسين SEO)
            $table->morphs('imageable'); // يضيف imageable_id و imageable_type لتحديد العلاقة
            $table->timestamps(); // created_at و updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
