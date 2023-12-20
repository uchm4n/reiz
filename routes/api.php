<?php

use Illuminate\Support\Facades\Route;
use App\Http\Api\Controllers\JobsController;


Route::middleware(['api'])->group(function () { // 'auth:sanctum'
    Route::get('/jobs/', [JobsController::class, 'getCollection']);
    Route::get('/jobs/{job}', [JobsController::class, 'get']);
    Route::post('/jobs', [JobsController::class, 'store']);
    Route::delete('/jobs/{job}', [JobsController::class, 'delete']);
});
