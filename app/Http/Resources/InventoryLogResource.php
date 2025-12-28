<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'product_id'=> $this->product_id,
            'user_id'   => $this->user_id,
            'old_stock' => $this->old_stock,
            'new_stock' => $this->new_stock,
            'changed_at'=> $this->changed_at->toDateTimeString(),
        ];
    }
}
