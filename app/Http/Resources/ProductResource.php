<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ProductResource extends JsonResource
{
    public static $wrap = false;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => $this->category->name,
            'categories_id' => $this->categories_id,
            'slug' => $this->slug,
            'description' => $this->description,
            'image_url' => $this->image ?: null,
            'prices' => $this->prices->map(function ($price) {
                return [
                    'id' => $price->id,
                    'number' => $price->number,
                    'size' => $price->size,
                ];
            }),
            'alergens' => $this->alergens->map(function ($alergen) {
                return [
                    'id' => $alergen->id,
                    'name' => $alergen->name,
                    'image' => $alergen->image,
                ];
            }),
            'published' => (bool)$this->published,
            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s'),
        ];
    }
}
