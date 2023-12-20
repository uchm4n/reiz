<?php

namespace App\Http\Api\Controllers;


use App\Http\Controller;
use Illuminate\Http\JsonResponse;

class JobDeleteController extends Controller
{
    public function __invoke(int $job): JsonResponse {

        return response()->json([
            'data' => ['test', $job],
            'status' => 200
        ]);
    }
}
