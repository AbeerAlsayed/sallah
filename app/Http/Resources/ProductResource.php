<?php

namespace App\Http\Resources;

class ProductResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'is_featured' => $this->is_featured,
            'is_new' => $this->is_new,
            'rating' => $this->rating,
            'category_id' => $this->category_id,
        ];
    }
}
