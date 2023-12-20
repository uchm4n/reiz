<?php

namespace App\Http\Api\Controllers;

use App\Http\Api\Requests\JobRequest;
use App\Http\Controller;
use Illuminate\Http\JsonResponse;

class JobCreateController extends Controller
{
    public function __invoke(JobRequest $request): JsonResponse {

        // insert into Redis
        // Redis::set($request->toArray());
        return response()->json([
            'data' => ['test'],
            'status' => 200
        ]);
    }
}
