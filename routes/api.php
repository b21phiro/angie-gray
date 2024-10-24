<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Media
Route::get('/media', [\App\Http\Controllers\MediaController::class, 'get']);

Route::post('/media', [\App\Http\Controllers\MediaController::class, 'post'])
    ->middleware('auth:sanctum');

Route::put('/media', [\App\Http\Controllers\MediaController::class, 'put'])
    ->middleware('auth:sanctum');

Route::delete('/media', [\App\Http\Controllers\MediaController::class, 'delete'])
    ->middleware('auth:sanctum');
