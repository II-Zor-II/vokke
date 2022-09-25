<?php

namespace App\Http\Controllers\Api;

use App\Models\Kangaroo;
use App\Http\Resources\Kangaroo as KangarooResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class KangarooController extends ApiController
{
    public function index() : JsonResource
    {
        $kangaroos = Kangaroo::all();
        $kangaroos->load('user');
        return KangarooResource::collection($kangaroos);
    }

    public function store(Request $request)
    {
        $kangaroo = Kangaroo::create([
            'user_id'   => $request->user()->id,
            'birth_date' => $request->birth_date,
            'name' => $request->name,
            'nickname' => $request->nickname,
            'color' => $request->color,
            'gender' => $request->gender,
            'friendliness' => $request->friendliness,
            'weight' => (float) $request->weight,
            'height' => (float) $request->height
        ]);
        return new KangarooResource($kangaroo);
    }

    public function update(Request $request, $id)
    {
        $kangaroo = Kangaroo::find($id);

        $save = $kangaroo->update([
            'birth_date' => $request->birth_date,
            'name' => $request->name,
            'nickname' => $request->nickname,
            'color' => $request->color,
            'gender' => $request->gender,
            'friendliness' => $request->friendliness,
            'weight' => (float) $request->weight,
            'height' => (float) $request->height
        ]);

        if ($save) {
            $kangaroo->load('user');
            return new KangarooResource($kangaroo);
        }

        return response()->json([
            'message' => 'failed to update resource.',
            'data' => $request->all()
        ], 400);
    }

}
