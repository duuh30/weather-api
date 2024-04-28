<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'location' => [
                'city' => $this->city,
                'state' => $this->region,
                'country' => $this->country,
            ],
            'weather' => [
                'temperature' => $this->temperature
            ],
            'time' => $this->time,
            'description' => $this->description
        ];
    }
}
