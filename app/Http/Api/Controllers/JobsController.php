<?php

namespace App\Http\Api\Controllers;


use App\Models\ReizJob;
use App\Http\Controller;
use App\Models\ReizJobDetail;
use Illuminate\Http\JsonResponse;
use App\Http\Api\Requests\JobRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Database\Eloquent\Builder;

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


    public function get($job, ReizJobDetail $detail): JsonResponse
    {
        $detail = $detail::with(['job' => fn(Builder $q) => $q->select(['id', 'url', 'selectors'])])
            // or
            // with('job:id,url,selectors')
            ->find($job);

        return response()->json([
            'data' => $detail
        ], Response::HTTP_OK);
    }

    public function store(JobRequest $request): JsonResponse
    {
        //save validated
        $job = ReizJob::query()->create($request->validated());

        // Dispatch a job
        \App\Jobs\ReizJob::dispatch($job);

        return response()->json([
            'data' => $request->validated()
        ], Response::HTTP_CREATED);
    }

    public function delete(int $job): JsonResponse
    {
        try {
            $job = ReizJob::findOrFail($job);
            $job->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => "Can not delete. No records found for id: $job"
            ], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'data' => $job
        ], Response::HTTP_NO_CONTENT);
    }
}
