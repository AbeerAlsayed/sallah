<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'parent_id'];

    // التصنيف الأب
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // التصنيفات الفرعية
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
