<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['title', 'description', 'discount_percentage', 'start_date', 'end_date', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
