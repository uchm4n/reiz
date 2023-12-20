<?php

use App\Http\Api\Controllers\JobCollectionController;
use App\Http\Api\Controllers\JobCreateController;
use App\Http\Api\Controllers\JobDeleteController;
use App\Http\Api\Controllers\JobGetController;
use Illuminate\Support\Facades\Route;


Route::middleware(['api'])->group(function () { // 'auth:sanctum'
    Route::get('/jobs/', JobCollectionController::class);
    Route::get('/jobs/{job}', JobGetController::class);
    Route::post('/jobs', JobCreateController::class);
    Route::delete('/jobs/{job}', JobDeleteController::class);
});
