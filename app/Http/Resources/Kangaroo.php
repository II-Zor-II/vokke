<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;

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
            'gender' => $this->gender,
            'friendliness' => $this->friendliness,
            'weight' => $this->weight,
            'height' => $this->height,
        ];
    }
}
