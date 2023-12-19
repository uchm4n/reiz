<?php

use App\Http\Api\Controllers\JobCreateController;
use App\Http\Api\Controllers\JobGetController;
use Illuminate\Support\Facades\Route;


Route::middleware(['api'])->group(function () { // 'auth:sanctum'
    Route::post('/jobs', JobCreateController::class);
    Route::get('/jobs/{job}', JobGetController::class);
});
