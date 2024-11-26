<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function create(array $data)
    {
        return Category::create($data); // إنشاء التصنيف
    }

    public function update(Category $category, array $data)
    {
        $category->update($data); // تحديث التصنيف
        return $category;
    }

    public function delete(Category $category)
    {
        return $category->delete(); // حذف التصنيف
    }
}
