<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'price', 'is_featured', 'is_new','rating', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getDiscountedPriceAttribute()
    {
        $currentOffer = $this->offers()
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();

        if ($currentOffer) {
            return $this->price - ($this->price * $currentOffer->discount_percentage / 100);
        }

        return $this->price;
    }
}

