<?php

namespace App\Http\Api\Controllers;


use App\Http\Controller;
use App\Models\ReizJob;
use Illuminate\Http\JsonResponse;

class JobCollectionController extends Controller
{
    public function __invoke(ReizJob $jobs): JsonResponse {
        $data = $jobs::query()
            //->with('detail')
            ->orderByDesc('created_at')
            ->take(100)
            ->get();

        return response()->json([
            'data' => $data,
            'status' => 200
        ]);
    }
}
