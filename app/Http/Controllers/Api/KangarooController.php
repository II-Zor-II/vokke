<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreKangaroo;
use App\Http\Requests\UpdateKangaroo;
use App\Models\Kangaroo;
use App\Http\Resources\Kangaroo as KangarooResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class KangarooController extends ApiController
{
    public function index(): JsonResource
    {
        $kangaroos = Kangaroo::all();
        $kangaroos->load('user');
        return KangarooResource::collection($kangaroos);
    }

    public function store(StoreKangaroo $request)
    {
        $kangaroo = Kangaroo::create([
            'user_id' => $request->user()->id,
            'birth_date' => $request->birth_date,
            'name' => $request->name,
            'nickname' => $request->nickname,
            'color' => $request->color,
            'gender' => $request->gender,
            'friendliness' => $request->friendliness,
            'weight' => (float)$request->weight,
            'height' => (float)$request->height
        ]);
        return new KangarooResource($kangaroo);
    }

    public function update(UpdateKangaroo $request, $id)
    {
        $kangaroo = Kangaroo::find($id);

        $save = $kangaroo->update([
            'birth_date' => $request->input('birth_date', $kangaroo->birth_date),
            'name' => $request->input('name', $kangaroo->name),
            'nickname' => $request->input('nickname', $kangaroo->nickname),
            'color' => $request->input('color', $kangaroo->color),
            'gender' => $request->input('gender', $kangaroo->gender),
            'friendliness' => $request->input('friendliness', $kangaroo->friendliness),
            'weight' => (float)$request->input('weight', $kangaroo->weight),
            'height' => (float)$request->input('height', $kangaroo->height)
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
