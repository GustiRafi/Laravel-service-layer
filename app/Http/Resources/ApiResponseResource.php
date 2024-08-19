<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResponseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => [
                'status' => $this->status,
                'code' => $this->code,
                'message' => $this->message,
            ],
            'details' => $this->details,
        ];
    }
}
