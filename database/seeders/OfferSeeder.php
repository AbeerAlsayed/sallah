<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Offer;
use App\Models\Product; // استيراد موديل المنتجات

class OfferSeeder extends Seeder
{
    public function run()
    {
        // الحصول على بعض المنتجات
        $iphone = Product::where('slug', 'iphone-14')->first();  // تأكد من أن slug المنتج صحيح
        $sonyHeadphones = Product::where('slug', 'sony-wh-1000xm4')->first();
        $samsungWatch = Product::where('slug', 'samsung-galaxy-watch-5')->first();
        $samsungPhone = Product::where('slug', 'samsung-galaxy-s23')->first();

        // إنشاء العروض
        Offer::create([
            'title' => 'عرض iPhone 14',
            'description' => 'خصم 10% على iPhone 14 لفترة محدودة!',
            'discount_percentage' => 10,  // خصم 10%
            'start_date' => now(), // تاريخ البداية سيكون اليوم
            'end_date' => now()->addDays(7), // العرض سينتهي بعد 7 أيام
            'product_id' => $iphone->id,  // ربط العرض بالمنتج باستخدام product_id
        ]);

        Offer::create([
            'title' => 'عرض سماعة Sony WH-1000XM4',
            'description' => 'خصم 15% على سماعة الرأس Sony WH-1000XM4 الشهيرة!',
            'discount_percentage' => 15,  // خصم 15%
            'start_date' => now(),
            'end_date' => now()->addDays(7),
            'product_id' => $sonyHeadphones->id,
        ]);

        Offer::create([
            'title' => 'عرض ساعة سامسونج Galaxy Watch 5',
            'description' => 'خصم 20% على ساعة سامسونج Galaxy Watch 5',
            'discount_percentage' => 20,  // خصم 20%
            'start_date' => now(),
            'end_date' => now()->addDays(10), // عرض أطول مدة
            'product_id' => $samsungWatch->id,
        ]);

        Offer::create([
            'title' => 'عرض هاتف Samsung Galaxy S23',
            'description' => 'خصم 10% على هاتف Samsung Galaxy S23، العرض ساري حتى نهاية الشهر.',
            'discount_percentage' => 10,  // خصم 10%
            'start_date' => now(),
            'end_date' => now()->endOfMonth(), // العرض ينتهي بنهاية الشهر
            'product_id' => $samsungPhone->id,
        ]);
    }
}
