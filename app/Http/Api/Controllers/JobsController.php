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
            'data' => $data
        ], Response::HTTP_OK);
    }


    public function get(ReizJobDetail $detail): JsonResponse
    {
        $detail = $detail::with(['job' => fn(Builder $q) => $q->select(['id', 'url', 'selectors'])])
            // or
            // with('job:id,url,selectors')
            ->get();

        return response()->json([
            'detail' => $detail
        ], Response::HTTP_OK);
    }


    public function store(JobRequest $request, ReizJob $job): JsonResponse
    {
        //save validated
        $job::create($request->validated());

        // Dispatch a job
        \App\Jobs\ReizJob::dispatch($request->validated());

        return response()->json([
            'data' => $request->validated()
        ], Response::HTTP_CREATED);
    }

    public function delete(): JsonResponse
    {
        return response()->json([
            'data' => ['test']
        ], Response::HTTP_NO_CONTENT);
    }
}
