<?php

use App\Http\Controllers\Api\galeryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\newsController;
use App\Http\Controllers\Api\schoolsController;
use Illuminate\Http\Middleware\HandleCors;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware([HandleCors::class])->group(function () {
Route::apiResource('news', newsController::class);
Route::apiResource('schools', schoolsController::class);
Route::apiResource('galery', galeryController::class);
});
