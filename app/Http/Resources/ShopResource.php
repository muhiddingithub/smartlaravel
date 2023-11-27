<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'merchant' => MerchantRecourse::make($this->merchant),
            'address' => $this->address,
            'schedule' => $this->schedule,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude
        ];
    }
}
