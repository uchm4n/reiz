<?php

use App\Http\Web\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [MainController::class, 'main']);
Route::get('/details/{id}', [MainController::class, 'details']);

Route::get('/test', function () {
    return view('main');
});
