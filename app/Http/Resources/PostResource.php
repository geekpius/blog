<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "externalId" => $this->external_id,
            "title" => $this->company,
            "content" => $this->contact,
            "banner" => new FileResource($this->whenLoaded('file')),
            "user" => new UserResource($this->whenLoaded('user')),
            "createdAt" => Carbon::parse($this->created_at)->format('d-M-Y'),
        ];
    }
}
