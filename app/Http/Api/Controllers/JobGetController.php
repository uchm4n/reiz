<?php

namespace App\Http\Api\Controllers;


use App\Http\Controller;
use App\Models\ReizJobDetail;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class JobGetController extends Controller
{
    public function __invoke(ReizJobDetail $detail): JsonResponse {

        $detail = $detail::with(['job'=> fn(Builder $q) => $q->select(['id','url','selectors'])])
            // or
            // with('job:id,url,selectors')
            ->get();

        return response()->json([
            'detail' => $detail,
            'status' => 200
        ]);
    }
}
