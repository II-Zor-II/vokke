<?php

namespace App\Http\Controllers\Api;

use App\Models\Kangaroo;
use App\Http\Resources\Kangaroo as KangarooResource;
use Illuminate\Http\Resources\Json\JsonResource;

class KangarooController extends ApiController
{
    public function index() : JsonResource {
        $kangaroos = Kangaroo::all();
        $kangaroos->load('user');
        return KangarooResource::collection($kangaroos);
    }
}
