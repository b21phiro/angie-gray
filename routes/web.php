<?php

use Illuminate\Support\Facades\Route;

// Website
Route::get('/', function () {
    echo "Hello world";
});

// Admin
Route::get('/admin', [\App\Http\Controllers\AdminController::class, "dashboard"])
    ->name("admin.dashboard")
    ->middleware('auth');

Route::get('/admin/media', [\App\Http\Controllers\AdminController::class, "media"])
    ->name("admin.media")
    ->middleware('auth');

Route::post('/admin/media', [\App\Http\Controllers\AdminController::class, "uploadMedia"])
    ->name("admin.media")
    ->middleware('auth');

Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, "logout"])
    ->name("admin.logout");

Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, "login"])
    ->name("admin.login");

Route::post('/admin/login', [\App\Http\Controllers\AdminController::class, "authenticate"]);
