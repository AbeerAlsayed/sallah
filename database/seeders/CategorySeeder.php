<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // إنشاء التصنيفات الرئيسية (الأب) للأجهزة الإلكترونية
        $electronicsCategory = Category::create([
            'name' => 'أجهزة إلكترونية',
            'slug' => 'electronic-devices',
            'description' => 'أدوات وأجهزة إلكترونية متنوعة',
            'parent_id' => null,  // التصنيف الأب
        ]);

        // إنشاء التصنيفات الفرعية للأجهزة الإلكترونية
        Category::create([
            'name' => 'هواتف',
            'slug' => 'phones',
            'description' => 'أحدث الهواتف المحمولة',
            'parent_id' => $electronicsCategory->id,  // التصنيف الأب
        ]);

        Category::create([
            'name' => 'ساعات ذكية',
            'slug' => 'smart-watches',
            'description' => 'ساعات ذكية تتمتع بتقنيات متقدمة',
            'parent_id' => $electronicsCategory->id,  // التصنيف الأب
        ]);

        Category::create([
            'name' => 'سماعات',
            'slug' => 'headphones',
            'description' => 'سماعات عالية الجودة مع تصميمات متنوعة',
            'parent_id' => $electronicsCategory->id,  // التصنيف الأب
        ]);

        Category::create([
            'name' => 'ساعات',
            'slug' => 'watches',
            'description' => 'ساعات متنوعة بأحدث التصاميم',
            'parent_id' => $electronicsCategory->id,  // التصنيف الأب
        ]);

        Category::create([
            'name' => 'جوالات',
            'slug' => 'mobile-phones',
            'description' => 'هواتف محمولة بأنواع مختلفة',
            'parent_id' => $electronicsCategory->id,  // التصنيف الأب
        ]);
    }
}
