<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreKangaroo;
use App\Http\Requests\UpdateKangaroo;
use App\Models\Kangaroo;
use App\Http\Resources\Kangaroo as KangarooResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends ApiController
{
    public function index(Request $request): JsonResource
    {
        $kangaroos = User::where('api_token', $request->bearerToken())
            ->first()
            ->kangaroos;
        return KangarooResource::collection($kangaroos);
    }
}
