<?php

namespace App\Http\Api\Controllers;


use App\Http\Api\Requests\JobRequest;
use App\Http\Controller;
use App\Models\ReizJob;
use App\Models\ReizJobDetail;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class JobsController extends Controller
{
    public function getCollection(ReizJob $jobs): JsonResponse
    {
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


    public function get(ReizJobDetail $detail): JsonResponse
    {
        $detail = $detail::with(['job' => fn(Builder $q) => $q->select(['id', 'url', 'selectors'])])
            // or
            // with('job:id,url,selectors')
            ->get();

        return response()->json([
            'detail' => $detail,
            'status' => 200
        ]);
    }


    public function store(JobRequest $request): JsonResponse
    {
        // insert into Redis
        // Redis::set($request->toArray());
        return response()->json([
            'data' => ['test'],
            'status' => 200
        ]);
    }

    public function delete(): JsonResponse
    {
        return response()->json([
            'data' => ['test'],
            'status' => 200
        ]);
    }
}
