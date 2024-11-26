<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;  // لاستخدام التصنيفات التي تم إنشاؤها

class ProductSeeder extends Seeder
{
    public function run()
    {
        // الحصول على التصنيفات المتاحة في الجدول
        $electronicsCategory = Category::where('slug', 'electronic-devices')->first();  // يمكن تغيير الاسم حسب التصنيف
        $phonesCategory = Category::where('slug', 'phones')->first();
        $smartWatchesCategory = Category::where('slug', 'smart-watches')->first();
        $headphonesCategory = Category::where('slug', 'headphones')->first();
        $watchesCategory = Category::where('slug', 'watches')->first();
        $mobilePhonesCategory = Category::where('slug', 'mobile-phones')->first();

        // إنشاء بعض المنتجات التجريبية
        Product::create([
            'name' => 'هاتف iPhone 14',
            'slug' => 'iphone-14',
            'description' => 'هاتف ذكي من Apple مع أحدث التقنيات.',
            'price' => 3500.00,
            'is_featured' => true,
            'is_new' => true,
            'rating' => 5, // التقييم بدون فواصل
            'category_id' => $phonesCategory->id,  // التصنيف المرتبط بالمنتج
        ]);

        Product::create([
            'name' => 'سماعة Sony WH-1000XM4',
            'slug' => 'sony-wh-1000xm4',
            'description' => 'سماعة رأس لاسلكية مع عزل صوت ممتاز.',
            'price' => 1200.00,
            'is_featured' => true,
            'is_new' => false,
            'rating' => 4, // التقييم بدون فواصل
            'category_id' => $headphonesCategory->id,
        ]);

        Product::create([
            'name' => 'ساعة سامسونج Galaxy Watch 5',
            'slug' => 'samsung-galaxy-watch-5',
            'description' => 'ساعة ذكية من سامسونج مع ميزات رياضية وصحية متطورة.',
            'price' => 950.00,
            'is_featured' => false,
            'is_new' => true,
            'rating' => 4, // التقييم بدون فواصل
            'category_id' => $smartWatchesCategory->id,
        ]);

        Product::create([
            'name' => 'هاتف Samsung Galaxy S23',
            'slug' => 'samsung-galaxy-s23',
            'description' => 'هاتف ذكي من سامسونج مع كاميرا احترافية وأداء قوي.',
            'price' => 3000.00,
            'is_featured' => false,
            'is_new' => true,
            'rating' => 5, // التقييم بدون فواصل
            'category_id' => $mobilePhonesCategory->id,
        ]);

        Product::create([
            'name' => 'ساعة كاسيو Classic',
            'slug' => 'casio-classic-watch',
            'description' => 'ساعة أنالوج كلاسيكية بتصميم عصري.',
            'price' => 150.00,
            'is_featured' => false,
            'is_new' => false,
            'rating' => 3, // التقييم بدون فواصل
            'category_id' => $watchesCategory->id,
        ]);

        Product::create([
            'name' => 'سماعة Bose QuietComfort 35 II',
            'slug' => 'bose-quietcomfort-35-ii',
            'description' => 'سماعة رأس لاسلكية مع خاصية عزل الضوضاء.',
            'price' => 1300.00,
            'is_featured' => true,
            'is_new' => false,
            'rating' => 5, // التقييم بدون فواصل
            'category_id' => $headphonesCategory->id,
        ]);
    }
}
