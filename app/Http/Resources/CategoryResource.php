<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * تحويل التصنيف إلى صيغة JSON.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'parent_id' => $this->parent_id,
            'children' => CategoryResource::collection($this->whenLoaded('children')),
            'products' => new ProductResource($this->whenLoaded('products')),
        ];    }
}
