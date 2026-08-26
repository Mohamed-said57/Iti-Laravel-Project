<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'release_year' => $this->release_year,
            'rating' => $this->rating,
            'image_url' => $this->image ? asset('images/' . $this->image) : null,
        ];
    }
}