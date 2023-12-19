<?php

namespace App\Http\Api\Controllers;


use App\Http\Shared\Controller;
use Illuminate\Http\JsonResponse;

class JobGetController extends Controller
{
    public function __invoke(int $job): JsonResponse {

        return response()->json([
            'data' => ['test', $job],
            'status' => 200
        ]);
    }
}
