<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;

class Kangaroo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'owner' => new UserResource($this->whenLoaded('user')),
            'id'    => $this->id,
            'birth_date' => $this->birth_date,
            'name' => $this->name,
            'nickname' => $this->nickname,
            'color' => $this->color,
            'gender' => ucfirst($this->gender),
            'friendliness' => ucfirst($this->friendliness),
            'weight' => round($this->weight,2),
            'height' => round($this->height, 2),
        ];
    }
}
