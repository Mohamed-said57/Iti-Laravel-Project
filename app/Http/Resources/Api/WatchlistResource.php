<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WatchlistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Device ID' => $this->device_id,
            'Movies' => MovieResource::collection($this->whenLoaded('movies')),
            'Created At' => $this->created_at->toIso8601String(),
        ];
    }
}
