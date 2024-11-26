<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('categories')->group(function () {
    Route::get('/filter', [CategoryController::class, 'filter']); // مسار عرض التصنيفات
    Route::get('/', [CategoryController::class, 'index']); // مسار عرض التصنيفات
    Route::post('/', [CategoryController::class, 'store']); // لإنشاء تصنيف
    Route::get('/{category}', [CategoryController::class, 'show']); // لتحديث تصنيف
    Route::put('/{category}', [CategoryController::class, 'update']); // لتحديث تصنيف
    Route::delete('/{category}', [CategoryController::class, 'destroy']); // لحذف تصنيف
});
