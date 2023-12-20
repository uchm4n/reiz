<?php

namespace App\Http\Api\Controllers;


use App\Http\Api\Requests\JobRequest;
use App\Http\Controller;
use App\Models\ReizJob;
use App\Models\ReizJobDetail;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

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
            'status' => Response::HTTP_OK
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
            'status' => Response::HTTP_OK
        ]);
    }


    public function store(JobRequest $request): JsonResponse
    {
        // insert into Redis
        // Redis::set($request->toArray());
        return response()->json([
            'data' => $request->all(),
            'status' => Response::HTTP_OK
        ]);
    }

    public function delete(): JsonResponse
    {
        return response()->json([
            'data' => ['test'],
            'status' => Response::HTTP_OK
        ]);
    }
}
